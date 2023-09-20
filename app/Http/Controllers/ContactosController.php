<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactosController extends Controller
{
    public function lista()
    {
        //return view('contactos.index');

        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        return view('contactos.index', ['pageConfigs' => $pageConfigs]);
    }


    public function datatable(Request $request)
    {
        // Conexión a la base de datos de Laravel

        $builder = DB::table('contactos');
        $builder->select('id', 'nombre', 'apellido', 'documento AS telefono', 'email', 'id_perfil', 'estado');

        // Paginación
        $offset = ($request->input('start')) ? $request->input('start') : 0;
        $builder->skip($offset)->take($request->input('length'));

        // Búsqueda
        if ($request->input('search.value'))
        {
            $builder->where(function($query) use ($request) {
                $query->where('nombre', 'like', '%' . $request->input('search.value') . '%')
                      ->orWhere('apellido', 'like', '%' . $request->input('search.value') . '%')
                      ->orWhere('email', 'like', '%' . $request->input('search.value') . '%');
            });
        }

        // Ordenamiento
        if ($request->input('order'))
        {
            $columna_orden = $request->input('columns')[$request->input('order.0.column')]['data'];
            $orden = $request->input('order.0.dir');
            $builder->orderBy($columna_orden, $orden);
        }

        $resultados = $builder->get();

        // Total de registros para la paginación
        $total_registros = DB::table('contactos')->count();

        // Total de registros después de la búsqueda, si la hay
        if ($request->input('search.value'))
        {
            $builder->where(function($query) use ($request) {
                $query->where('nombre', 'like', '%' . $request->input('search.value') . '%')
                      ->orWhere('apellido', 'like', '%' . $request->input('search.value') . '%')
                      ->orWhere('email', 'like', '%' . $request->input('search.value') . '%');
            });
        }

        $total_registros_filtrados = $builder->count();

        $response = [
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $total_registros,
            'recordsFiltered' => $total_registros_filtrados,
            'data' => $resultados,
        ];

        return response()->json($response);
    }

}