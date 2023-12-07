<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;


class InvoiceNewSend extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $factura = DB::table('facturas')
            ->select('facturas.id',
                'facturas.grupo',
                'facturas.id_factura_tipo',
                'empresas.empresa',
                'sys_monedas.simbolo',
                'empresas_fiscales.id as id_empresa_fiscal',
                'empresas_fiscales.razon_social',
                'facturas.fecha',
                'facturas.vencimiento',
                'facturas.total_neto',
                'facturas.saldo',
                'contactos.email',
                'contactos.nombre',
                'contactos.apellido',
                DB::raw("CONCAT(facturas_tipo.factura_tipo, ' ', lpad(facturas.numero_talonario, 4, '0'), '-', lpad(IF(facturas.numero_factura, facturas.numero_factura, '********'), 8, '0')) AS comprobante"))
            ->leftJoin('facturas_tipo', 'facturas.id_factura_tipo', '=', 'facturas_tipo.id')
            ->leftJoin('empresas_fiscales', 'facturas.id_empresa_fiscal', '=', 'empresas_fiscales.id')
            ->leftJoin('empresas', 'empresas_fiscales.id_empresa', '=', 'empresas.id')
            ->leftJoin('sys_monedas', 'facturas.id_moneda', '=', 'sys_monedas.id')
            ->leftJoin('formas_pago', 'facturas.id_forma_pago', '=', 'formas_pago.id')
            ->leftJoin('contactos', 'empresas.id_contacto', '=', 'contactos.id')
            ->where('facturas.id', $this->id)
            ->first();

        if (!$factura)
        {
            throw new \Exception('No invoice found for notification.');
        }

        $factura->hash = $factura->grupo . '-' . $factura->id_empresa_fiscal . '-' . $factura->id;

        return $this->view('emails.invoice_new', ['factura' => $factura])
            ->subject('Nueva Factura ' . $factura->comprobante)
            ->from('info@revisionalpha.es', 'revision alpha')
            ->replyTo('diego@revisionalpha.es', 'Diego Mascarenhas Goytía');
    }
}
