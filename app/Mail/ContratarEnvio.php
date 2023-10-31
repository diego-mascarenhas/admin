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

    public function __construct($nombre, $empresa, $email, $telefono, $id_plan, $dominio)
    {
        $this->nombre = $nombre;
        $this->empresa = $empresa;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->id_plan = $id_plan;
        $this->dominio = $dominio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Nuevo servicio contratado')
            ->view('emails.contratar');
    }
}
