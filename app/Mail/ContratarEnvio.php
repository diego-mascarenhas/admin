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
    public $email;
    public $password;
    public $plan;
    public $dominio;
    public $cupon;

    public function __construct($nombre, $email, $password, $plan, $dominio, $cupon)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
        $this->plan = $plan;
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
