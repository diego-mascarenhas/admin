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
        // Validación de campos
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'empresa' => 'required|string',
            'email' => 'required|email',
            'telefono' => 'nullable|string|max:20',
            //'aceptar_terminos' => 'accepted',
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

        Mail::to('formularios@admin.revisionalpha.es')->send(new EmailEnvio($nombre, $empresa, $email, $telefono));

        return "Correo enviado exitosamente";
    }
}
