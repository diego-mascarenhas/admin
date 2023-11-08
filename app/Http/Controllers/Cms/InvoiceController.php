<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\CmsContact;
use App\Models\CmsEnrterpriseBilling;
use App\Models\CmsInvoice;
use PDF;

class InvoiceController extends Controller
{
    public function index()
    {
        $id_empresa = CmsContact::getIdEnterpriseFromIdUser(auth()->user()->id);
        $id_empresa_fiscal = CmsEnrterpriseBilling::getIdEnterpriseBillingFromIdEnterprise($id_empresa);

        $facturas = CmsInvoice::where('grupo', 515)
            ->where('id_empresa_fiscal', $id_empresa_fiscal)
            ->take(3)
            ->get();

        // foreach ($facturas as $plan)
        // {
        //     $plan->caracteristicas = json_decode($plan->caracteristicas, true);
        // }
        
        //print_r($facturas);
        return view('cms.app-invoice-list', ['facturas' => $facturas]);
    }

    public function generatePDF()
    {
        $data = [
            'title' => 'Welcome to revisionalpha.es',
            'date' => date('m/d/Y')
        ];
          
        $pdf = Pdf::loadView('pdfs.factura_a_B16704934_exportacion', $data);
    
        return $pdf->download('revisionalpha-' . date('m/d/Y') . '.pdf');
    }

    
}
