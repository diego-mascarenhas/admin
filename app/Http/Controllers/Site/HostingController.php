<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CmsGeneralCategory;

class HostingController extends Controller
{
    public function index()
    {
        $planes = CmsGeneralCategory::where('grupo', 515)
            ->where('id_tipo', 1)
            ->where('estado', 3)
            ->orderBy('orden', 'ASC')
            ->take(3)
            ->get();

        foreach ($planes as $plan)
        {
            $plan->caracteristicas = json_decode($plan->caracteristicas, true);
        }

        return view('site.hosting', ['planes' => $planes]);
    }
}
