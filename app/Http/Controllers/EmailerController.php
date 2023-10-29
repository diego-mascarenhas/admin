<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralCategory;

class EmailerController extends Controller
{
    public function index()
    {
        $planes = GeneralCategory::where('grupo', 515)
            ->where('id_tipo', 4)
            ->where('estado', 3)
            ->orderBy('orden', 'ASC')
            ->take(12)
            ->get();

        foreach ($planes as $plan)
        {
            $plan->caracteristicas = json_decode($plan->caracteristicas, true);
        }

        return view('site.emailer', ['planes' => $planes]);
    }
}