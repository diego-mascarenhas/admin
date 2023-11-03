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
    public $razon_social;
    public $documento;
    public $email;
    public $password;
    public $telefono;
    public $id_plan;
    public $dominio;
    public $cupon;

    public function __construct($nombre, $empresa, $razon_social, $documento, $email, $password, $telefono, $id_plan, $dominio, $cupon)
    {
        $this->nombre = $nombre;
        $this->empresa = $empresa;
        $this->razon_social = $razon_social;
        $this->documento = $documento;
        $this->email = $email;
        $this->password = $password;
        $this->telefono = $telefono;
        $this->id_plan = $id_plan;
        $this->dominio = $dominio;
        $this->cupon = $cupon;
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
