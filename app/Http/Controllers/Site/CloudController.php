<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralCategory;

class CloudController extends Controller
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
}
