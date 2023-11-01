<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContratarEnvio extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $nombre;
    public $empresa;
    public $email;
    public $telefono;
    public $id_plan;
    public $dominio;
    public $plan;

    public function __construct($nombre, $empresa, $email, $telefono, $id_plan, $dominio, $plan)
    {
        $this->nombre = $nombre;
        $this->empresa = $empresa;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->id_plan = $id_plan;
        $this->dominio = $dominio;
        $this->dominio = $plan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Alta de Servicio')
            ->view('emails.contratar');
    }
}
