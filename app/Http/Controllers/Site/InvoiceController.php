<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CmsInvoice;
use PDF;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
