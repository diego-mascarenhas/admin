<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\EmailEnvio;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{
    public function enviarEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|min:5|max:100',
            'empresa' => 'nullable|string',
            'email' => 'required|email',
            'telefono' => 'nullable|string|max:20',
            'mensaje' => 'required|string|min:10',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $nombre = $request->input('nombre');
        $empresa = $request->input('empresa');
        $email = $request->input('email');
        $telefono = $request->input('telefono');
        $mensaje = $request->input('mensaje');

        $email = new EmailEnvio($nombre, $empresa, $email, $telefono, $mensaje);

        try {
            Mail::to('formularios@admin.revisionalpha.es')->send($email);
        
            session()->flash('success', '¡El correo se ha enviado con éxito!');
        } catch (\Exception $e) {
            session()->flash('error', 'Hubo un error al enviar el correo: ' . $e->getMessage());
        }
    
        return redirect()->back();
    }
}
