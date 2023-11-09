<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\CmsContact;
use Illuminate\Support\Facades\DB;
use PDF;

class InvoiceController extends Controller
{
    public function index()
    {
        $id_empresa = CmsContact::getIdEnterpriseFromIdUser(auth()->user()->id);

        $facturas = DB::table('facturas')
            ->select('facturas.id', DB::raw("CONCAT(facturas_tipo.factura_tipo, ' ', lpad(facturas.numero_talonario, 4, '0'), '-', lpad(IF(facturas.numero_factura, facturas.numero_factura, '********'), 8, '0')) AS comprobante"),
                DB::raw("IF(facturas.cae_numero, CONCAT('http://wsaa.revisionalpha.com/', MD5(CONCAT(facturas.grupo, facturas.id)), '.pdf'), NULL) AS link"),
                'empresas_fiscales.id as id_empresa_fiscal',
                'empresas_fiscales.razon_social',
                'facturas.fecha',
                'facturas.vencimiento',
                'facturas.total_neto',
                'facturas.saldo',
                'facturas.enviado',
                'facturas.recibido',
                'empresas.empresa',
                'empresas.id as id_empresa',
                'formas_pago.forma_pago',
                'facturas.id_forma_pago',
                'sys_monedas.simbolo',
                'facturas.padre')
            ->leftJoin('facturas_tipo', 'facturas.id_factura_tipo', '=', 'facturas_tipo.id')
            ->leftJoin('empresas_fiscales', 'facturas.id_empresa_fiscal', '=', 'empresas_fiscales.id')
            ->leftJoin('empresas', 'empresas_fiscales.id_empresa', '=', 'empresas.id')
            ->leftJoin('sys_monedas', 'facturas.id_moneda', '=', 'sys_monedas.id')
            ->leftJoin('formas_pago', 'facturas.id_forma_pago', '=', 'formas_pago.id')
            ->where('empresas.id', $id_empresa)
            ->get();

        return view('cms.app-invoice-list', ['facturas' => $facturas]);
    }

    public function show($id)
    {
        $factura = DB::table('facturas')
        ->select('facturas.id', 'facturas.grupo', 'facturas.id_factura_tipo', 'facturas_tipo.id_afip', 'facturas_tipo.cuit AS afip_cuit', 'facturas.operacion', 'facturas.cae_numero', 'facturas.numero_talonario', 'facturas.numero_factura',
        DB::raw("CONCAT(facturas_tipo.factura_tipo, ' ', lpad(facturas.numero_talonario, 4, '0'), '-', lpad(IF(facturas.numero_factura, facturas.numero_factura, '********'), 8, '0')) AS comprobante"),
        DB::raw("IF(facturas.cae_numero, CONCAT('http://wsaa.revisionalpha.com/', md5(CONCAT(facturas.grupo,facturas.id)), '.pdf'), NULL) as link"),
        DB::raw("IF(facturas.cae_numero, CONCAT('http://wsaa.revisionalpha.com/descargar/', md5(CONCAT(facturas.grupo,facturas.id))), NULL) as descargar"),
        'empresas_fiscales.id as id_empresa_fiscal', 'empresas_fiscales.razon_social', 'empresas_fiscales.cuit', 'facturas.fecha',
        'facturas.vencimiento', 'facturas.bruto', 'facturas.descuento', 'facturas.total_neto', 'facturas.saldo',
        //DB::raw("UNIX_TIMESTAMP(CONVERT_TZ(facturas.enviado, '+00:00', @@global.time_zone)) AS enviado"), 'facturas.SUBTOTAL105', 'facturas.IMP105', 'facturas.NO_GRAVADOS105', 'facturas.SUBTOTAL210', 'facturas.IMP210', 'facturas.NO_GRAVADOS210', 'facturas.SUBTOTAL270', 'facturas.IMP270', 'facturas.NO_GRAVADOS275', 'facturas.EXENTO', 'facturas.RETENCION_IVA', 'facturas.RETENCION_IIBB', 'facturas.RETENCIONES_GENERALES', 'facturas.PERCEPCION_IIBB',
        DB::raw("UNIX_TIMESTAMP(CONVERT_TZ(facturas.recibido, '+00:00', @@global.time_zone)) AS recibido"), 'empresas.empresa', 'empresas.id as id_empresa', 'formas_pago.forma_pago', 'facturas.id_forma_pago', 'sys_monedas.simbolo', 'sys_monedas.codigo AS moneda_codigo', 'facturas.estado AS id_estado', 'facturas.error')
            ->leftJoin('facturas_tipo', 'facturas.id_factura_tipo', '=', 'facturas_tipo.id')
            ->leftJoin('empresas_fiscales', 'facturas.id_empresa_fiscal', '=', 'empresas_fiscales.id')
            ->leftJoin('empresas', 'empresas_fiscales.id_empresa', '=', 'empresas.id')
            ->leftJoin('sys_monedas', 'facturas.id_moneda', '=', 'sys_monedas.id')
            ->leftJoin('formas_pago', 'facturas.id_forma_pago', '=', 'formas_pago.id')
            ->where('facturas.id', $id)
            ->first();

        $items = DB::table('facturas_items')->select('facturas_items.id', 'facturas_items.id_categoria', 'facturas_items.descripcion', 'facturas_items.valor', 'facturas_items.descuento', 'facturas_tipo.impuesto', DB::raw('ROUND((facturas_items.valor-facturas_items.descuento)*facturas_tipo.impuesto/100+(facturas_items.valor-facturas_items.descuento), 2) AS total_neto'))
            ->join('facturas', 'facturas_items.id_factura', '=', 'facturas.id')
            ->join('facturas_tipo', 'facturas.id_factura_tipo', '=', 'facturas_tipo.id')
            ->where('facturas_items.id_factura', $factura->id)
            ->get();

        return view('cms.app-invoice-view', ['factura' => $factura, 'items' => $items]);
    }

    public function descargar($id)
    {
        $factura = DB::table('facturas')
        ->select('facturas.id', 'facturas.grupo', 'facturas.id_factura_tipo', 'facturas_tipo.id_afip', 'facturas_tipo.cuit AS afip_cuit', 'facturas.operacion', 'facturas.cae_numero', 'facturas.numero_talonario', 'facturas.numero_factura',
        DB::raw("CONCAT(facturas_tipo.factura_tipo, ' ', lpad(facturas.numero_talonario, 4, '0'), '-', lpad(IF(facturas.numero_factura, facturas.numero_factura, '********'), 8, '0')) AS comprobante"),
        'empresas_fiscales.id as id_empresa_fiscal', 'empresas_fiscales.razon_social', 'empresas_fiscales.cuit', 'facturas.fecha',
        'facturas.vencimiento', 'facturas.bruto', 'facturas.descuento', 'facturas.total_neto', 'facturas.saldo',
        'empresas.empresa', 'empresas.id as id_empresa', 'formas_pago.forma_pago', 'facturas.id_forma_pago', 'sys_monedas.simbolo', 'sys_monedas.codigo AS moneda_codigo', 'facturas.estado AS id_estado', 'facturas.error')
            ->leftJoin('facturas_tipo', 'facturas.id_factura_tipo', '=', 'facturas_tipo.id')
            ->leftJoin('empresas_fiscales', 'facturas.id_empresa_fiscal', '=', 'empresas_fiscales.id')
            ->leftJoin('empresas', 'empresas_fiscales.id_empresa', '=', 'empresas.id')
            ->leftJoin('sys_monedas', 'facturas.id_moneda', '=', 'sys_monedas.id')
            ->leftJoin('formas_pago', 'facturas.id_forma_pago', '=', 'formas_pago.id')
            ->where('facturas.id', $id)
            ->first();

        $items = DB::table('facturas_items')->select('facturas_items.id', 'facturas_items.id_categoria', 'facturas_items.descripcion', 'facturas_items.valor', 'facturas_items.descuento', 'facturas_tipo.impuesto', DB::raw('ROUND((facturas_items.valor-facturas_items.descuento)*facturas_tipo.impuesto/100+(facturas_items.valor-facturas_items.descuento), 2) AS total_neto'))
            ->join('facturas', 'facturas_items.id_factura', '=', 'facturas.id')
            ->join('facturas_tipo', 'facturas.id_factura_tipo', '=', 'facturas_tipo.id')
            ->where('facturas_items.id_factura', $factura->id)
            ->get();

        $pdf = Pdf::loadView('pdfs.factura_a_B16704934', ['factura' => $factura, 'items' => $items]);

        return $pdf->download('revisionalpha-' . $factura->comprobante . '.pdf');
    }


}
