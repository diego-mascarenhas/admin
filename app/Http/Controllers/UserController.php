<?php

namespace App\Http\Controllers;

use AddUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        return view('cms.user-list', ['pageConfigs' => $pageConfigs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            //'password' => 'required|string|min:8',
        ]);

        $data = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            //'password' => bcrypt($request->input('password')), // Hash de la contraseña
            //'password' => bcrypt('hardcoded'),
        ]);

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function datatable(Request $request)
    {
        // Conexión a la base de datos
        $builder = DB::table('users');
        $builder->select('id', 'name', 'phone', 'email', 'email_verified_at');

        // Paginación
        $offset = ($request->input('start')) ? $request->input('start') : 0;
        $builder->skip($offset)->take($request->input('length'));

        // Búsqueda
        if ($request->input('search.value'))
        {
            $builder->where(function($query) use ($request) {
                $query->where('name', 'like', '%' . $request->input('search.value') . '%')
                      ->orWhere('phone', 'like', '%' . $request->input('search.value') . '%')
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
        $total_registros = DB::table('users')->count();

        // Total de registros después de la búsqueda, si la hay
        if ($request->input('search.value'))
        {
            $builder->where(function($query) use ($request) {
                $query->where('name', 'like', '%' . $request->input('search.value') . '%')
                      ->orWhere('phone', 'like', '%' . $request->input('search.value') . '%')
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
