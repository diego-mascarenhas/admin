<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralCategory;

class ContratarController extends Controller
{
    public function index()
    {
        $planes = GeneralCategory::where('grupo', 515)
            ->where('id_tipo', 2)
            ->where('estado', 3)
            ->orderBy('orden', 'ASC')
            ->take(3)
            ->get();

        foreach ($planes as $plan)
        {
            $plan->caracteristicas = json_decode($plan->caracteristicas, true);
        }

        return view('site.cloud', ['planes' => $planes]);
    }


    public function show($id)
    {
        $item = GeneralCategory::find($id);

        // if (!$plan) {
        //     // Manejar el caso en el que el plan no se encuentra
        //     return redirect()->route('ruta_para_redireccionar_si_no_se_encuentra');
        // }

        // Ahora puedes acceder a los datos del plan
        //$nombre = $plan->id;
        //$descripcion = $plan->categoria;
        // Y así sucesivamente

        $item->caracteristicas = json_decode($item->caracteristicas, true);

        return view('site.contratar', compact('item'));



        // foreach ($planes as $plan)
        // {
        //     $plan->caracteristicas = json_decode($plan->caracteristicas, true);
        // }

        //return view('site.contratar', ['plan' => $planes]);
    }
}
