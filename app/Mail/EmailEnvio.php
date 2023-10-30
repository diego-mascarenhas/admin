<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailEnvio extends Mailable
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
    public $mensaje;

    public function __construct($nombre, $empresa, $email, $telefono, $mensaje)
    {
        $this->nombre = $nombre;
        $this->empresa = $empresa;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->mensaje = $mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Contacto desde revision alpha')
            ->view('emails.contactenos');
    }
}
