<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;

class TestSmtp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:smtp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test SMTP functionality';

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
        Mail::to('formularios@admin.revisionalpha.es')->send(new TestEmail);

        $this->info('SMTP test command executed successfully!');

        return 0;
    }
}
