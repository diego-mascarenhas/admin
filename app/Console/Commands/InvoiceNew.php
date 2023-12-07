<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceNewSend;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\CmsInvoice;

class InvoiceNew extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:new {id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'New Invoice Notification';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $id = $this->argument('id');

        if ($id)
        {
            $this->sendInvoice($id);
        }
        else
        {
            $invoicesPending = DB::table('facturas')
                ->where('facturas.grupo', 515) // env('CMSGROUP')
                ->where('facturas.operacion', 'V')
                ->where('facturas.estado', 2)
                ->whereNull('facturas.enviado')
                ->where('facturas.saldo', '>=', 0)
                ->take(1)
                ->pluck('id');

            if ($invoicesPending->isNotEmpty())
            {
                foreach ($invoicesPending as $id)
                {
                    $this->sendInvoice($id);
                }
            }
            else
            {
                $this->info('There are no invoices to send.');
            }
        }

        return 0;
    }


    protected function sendInvoice($id)
    {
        try
        {
            $invoiceSend = new InvoiceNewSend($id);
            $invoiceSend->build();

            Mail::to('formularios@admin.revisionalpha.es')->send($invoiceSend);
            CmsInvoice::where('id', $id)->update(['enviado' => now()]);

            $this->info('New Invoice (' . $id . ') Notification successfully!');
        }
        catch (Exception $e)
        {
            $this->info($e->getMessage());
        }
    }

}
