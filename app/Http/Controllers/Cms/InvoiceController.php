<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\CmsContact;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\Crypt;

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
            ->where('facturas.estado', 2)
            ->get();

        return view('cms.app-invoice-list', ['facturas' => $facturas]);
    }

    public function show($id)
    {
        $factura = DB::table('facturas')
            ->select('facturas.id',
                'facturas.grupo',
                'facturas.id_factura_tipo',
                'facturas_tipo.id_afip',
                'facturas_tipo.cuit AS afip_cuit',
                'empresas.empresa',
                'empresas.id as id_empresa',
                'formas_pago.forma_pago',
                'facturas.id_forma_pago',
                'sys_monedas.simbolo',
                'sys_monedas.codigo AS moneda_codigo',
                'facturas.estado AS id_estado',
                'facturas.error',
                'empresas_fiscales.id as id_empresa_fiscal',
                'empresas_fiscales.razon_social',
                'empresas_fiscales.cuit',
                'empresas_fiscales.id_condicion_iva',
                'empresas_fiscales.domicilio',
                'empresas_fiscales.codigo_postal',
                'empresas_fiscales.localidad',
                'empresas_fiscales.provincia',
                'sys_paises.pais',
                'facturas.fecha',
                'facturas.vencimiento',
                'facturas.bruto',
                'facturas.descuento',
                'facturas.total_neto',
                'facturas.saldo',
                DB::raw("CONCAT(facturas_tipo.factura_tipo, ' ', lpad(facturas.numero_talonario, 4, '0'), '-', lpad(IF(facturas.numero_factura, facturas.numero_factura, '********'), 8, '0')) AS comprobante"))
            ->leftJoin('facturas_tipo', 'facturas.id_factura_tipo', '=', 'facturas_tipo.id')
            ->leftJoin('empresas_fiscales', 'facturas.id_empresa_fiscal', '=', 'empresas_fiscales.id')
            ->leftJoin('empresas', 'empresas_fiscales.id_empresa', '=', 'empresas.id')
            ->leftJoin('sys_monedas', 'facturas.id_moneda', '=', 'sys_monedas.id')
            ->leftJoin('formas_pago', 'facturas.id_forma_pago', '=', 'formas_pago.id')
            ->leftJoin('sys_paises', 'empresas_fiscales.pais', '=', 'sys_paises.codigo')
            ->where('facturas.id', $id)
            ->first();

        $items = DB::table('facturas_items')->select('facturas_items.id', 'facturas_items.id_categoria', 'facturas_items.descripcion', 'facturas_items.valor', 'facturas_items.descuento', 'facturas_tipo.impuesto', DB::raw('ROUND((facturas_items.valor-facturas_items.descuento)*facturas_tipo.impuesto/100+(facturas_items.valor-facturas_items.descuento), 2) AS total_neto'))
            ->join('facturas', 'facturas_items.id_factura', '=', 'facturas.id')
            ->join('facturas_tipo', 'facturas.id_factura_tipo', '=', 'facturas_tipo.id')
            ->where('facturas_items.id_factura', $factura->id)
            ->get();

        //$factura->hash = Crypt::encryptString($factura->id);
        $factura->hash = $factura->grupo . '-' . $factura->id_empresa_fiscal . '-' . $factura->id;

        return view('cms.app-invoice-view', ['factura' => $factura, 'items' => $items]);
    }

    public function download($hash)
    {
        try
        {
            //$id = Crypt::decryptString($hash);
            $explode = explode('-', $hash);

            $factura = DB::table('facturas')
                ->select('facturas.id',
                    'facturas.grupo',
                    'facturas.id_factura_tipo',
                    'facturas_tipo.id_afip',
                    'facturas_tipo.cuit AS afip_cuit',
                    'empresas.empresa',
                    'empresas.id as id_empresa',
                    'formas_pago.forma_pago',
                    'facturas.id_forma_pago',
                    'sys_monedas.simbolo',
                    'sys_monedas.codigo AS moneda_codigo',
                    'facturas.estado AS id_estado',
                    'facturas.error',
                    'empresas_fiscales.id as id_empresa_fiscal',
                    'empresas_fiscales.razon_social',
                    'empresas_fiscales.cuit',
                    'empresas_fiscales.id_condicion_iva',
                    'empresas_fiscales.domicilio',
                    'empresas_fiscales.codigo_postal',
                    'empresas_fiscales.localidad',
                    'empresas_fiscales.provincia',
                    'sys_paises.pais',
                    'facturas.fecha',
                    'facturas.vencimiento',
                    'facturas.bruto',
                    'facturas.descuento',
                    'facturas.total_neto',
                    'facturas.saldo',
                    DB::raw("CONCAT(facturas_tipo.factura_tipo, ' ', lpad(facturas.numero_talonario, 4, '0'), '-', lpad(IF(facturas.numero_factura, facturas.numero_factura, '********'), 8, '0')) AS comprobante"))
                ->leftJoin('facturas_tipo', 'facturas.id_factura_tipo', '=', 'facturas_tipo.id')
                ->leftJoin('empresas_fiscales', 'facturas.id_empresa_fiscal', '=', 'empresas_fiscales.id')
                ->leftJoin('empresas', 'empresas_fiscales.id_empresa', '=', 'empresas.id')
                ->leftJoin('sys_monedas', 'facturas.id_moneda', '=', 'sys_monedas.id')
                ->leftJoin('formas_pago', 'facturas.id_forma_pago', '=', 'formas_pago.id')
                ->leftJoin('sys_paises', 'empresas_fiscales.pais', '=', 'sys_paises.codigo')
                ->where('facturas.grupo', $explode[0])
                ->where('facturas.id_empresa_fiscal', $explode[1])
                ->where('facturas.id', $explode[2])
                ->first();

            $items = DB::table('facturas_items')->select('facturas_items.id', 'facturas_items.id_categoria', 'facturas_items.descripcion', 'facturas_items.valor', 'facturas_items.descuento', 'facturas_tipo.impuesto', DB::raw('ROUND((facturas_items.valor-facturas_items.descuento)*facturas_tipo.impuesto/100+(facturas_items.valor-facturas_items.descuento), 2) AS total_neto'))
                ->join('facturas', 'facturas_items.id_factura', '=', 'facturas.id')
                ->join('facturas_tipo', 'facturas.id_factura_tipo', '=', 'facturas_tipo.id')
                ->where('facturas_items.id_factura', $factura->id)
                ->get();

            $pdf = Pdf::loadView('pdfs.factura_a_B16704934', ['factura' => $factura, 'items' => $items]);

            return $pdf->download('revisionalpha-' . $factura->comprobante . '.pdf');
        }
        catch (\Illuminate\Contracts\Encryption\DecryptException $e)
        {
            abort(403);
        }
    }


}