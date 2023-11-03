<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralCategory;

use App\Mail\ContratarEnvio;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;

class ContratarController extends Controller
{
    public function create($id)
    {
        $item = GeneralCategory::find($id);

        $item->caracteristicas = json_decode($item->caracteristicas, true);

        return view('site.contratar', compact('item'));
    }


    public function store(Request $request)
    {
        // if ($request->has('dominio'))
        // {
        //     $dominio = $request->input('dominio');

        //     if (substr($dominio, 0, 4) !== 'http')
        //     {
        //         $dominio = 'http://' . $dominio;
        //     }

        //     $request->merge(['dominio' => $dominio]);
        // }

        $password = Str::random(12);

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|min:3|max:100',
            'empresa' => 'nullable|string',
            'email' => 'required|string|email|max:255|unique:users',
            'telefono' => 'nullable|string|max:20',
            'razon_social' => 'required|string',
            'documento' => 'required|string',
            'id' => 'required|integer',
            'terminos' => 'accepted',
            //'dominio' => 'url',
            'dominio' => [
                'nullable',
                'string',
                function ($attribute, $value, $fail) use ($request)
                {
                    if (in_array($request->input('id_tipo'), [1, 2]) && empty($value))
                    {
                        $fail('El dominio es obligatorio para los planes de Hosting');
                    }
                },
            ],
        ]);

        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Crear un nuevo usuario
        if (auth()->guest())
        {
            $user = new User;
            $user->name = $request->input('nombre');
            $user->email = $request->input('email');
            $user->password = Hash::make($password);
            $user->save();

            // Iniciar sesión automáticamente
            event(new Registered($user));
            auth()->login($user);
        }

        $nombre = $request->input('nombre');
        $empresa = $request->input('empresa');
        $razon_social = $request->input('razon_social');
        $documento = $request->input('documento');
        $email = $request->input('email');
        $telefono = $request->input('telefono');
        $id = $request->input('id');
        $dominio = $request->input('dominio');
        $cupon = $request->input('cupon');

        $email = new ContratarEnvio($nombre, $empresa, $razon_social, $documento, $email, $password, $telefono, $id, $dominio, $cupon);

        try
        {
            Mail::to('formularios@admin.revisionalpha.es')->send($email);

            return redirect()->route('contratar.create', ['id' => $id])->with('success', 'Su plan ha sido dado de alta, en breve le estaremos enviando los accesos a su email');
        }
        catch (\Exception $e)
        {
            return redirect()->route('contratar.create')->with('error', 'Se ha producido un error al querer crear el plan, por favor inténtalo más tarde. (' . $e->getMessage() . ')');
        }
    }


}
