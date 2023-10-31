<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralCategory;

use App\Mail\ContratarEnvio;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;



class ContratarController extends Controller
{
    public function index()
    {
        return redirect()->back();
    }

    public function create($id)
    {
        $item = GeneralCategory::find($id);

        $item->caracteristicas = json_decode($item->caracteristicas, true);

        return view('site.contratar', compact('item'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|min:3|max:100',
            'empresa' => 'nullable|string',
            'email' => 'required|email',
            'telefono' => 'nullable|string|max:20',
            'id_plan' => 'required|integer',
            'terminos' => 'accepted',
            'dominio' => [
                'nullable',
                'string',
                'max:255',
                function ($attribute, $value, $fail) use ($request) {
                    if (in_array($request->input('id_tipo'), [1, 2]) && empty($value)) {
                        $fail('El dominio es obligatorio para los planes de Hosting.');
                    }
                },
            ],
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
        $id_plan = $request->input('id_plan');
        $dominio = $request->input('dominio');

        $email = new ContratarEnvio($nombre, $empresa, $email, $telefono, $id_plan, $dominio);

        try {
            Mail::to('formularios@admin.revisionalpha.es')->send($email);
        
            return redirect()->route('contratar.create', ['id' => $id_plan])->with('success', 'Contratación exitosa!');
        } catch (\Exception $e) {
            return redirect()->route('contratar.create')->with('error', 'Hubo un error en el proceso de contratación: ' . $e->getMessage());
        }
    }
}
