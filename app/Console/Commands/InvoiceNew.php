<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceNewSend;
use Exception;

class InvoiceNew extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:new';

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
        try
        {
            $invoiceSend = new InvoiceNewSend;
            $invoiceSend->build();

            Mail::to('formularios@admin.revisionalpha.es')->send($invoiceSend);

            $this->info('New Invoice Notification successfully!');
        }
        catch (Exception $e)
        {
            $this->info($e->getMessage());
        }

        return 0;
    }
}
