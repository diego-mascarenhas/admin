<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Services\StripeService;
use Illuminate\Support\Facades\Log;

class HostingController extends Controller
{
    protected $stripeService;

    public function __construct(StripeService $stripeService)
    {
        $this->stripeService = $stripeService;
    }

    public function index()
    {
        try {
            $planes = $this->stripeService->getPlans();

            return view('site.hosting', [
                'planes' => $planes->data
            ]);
        } catch (\Exception $e) {
            Log::error('Error en HostingController: ' . $e->getMessage());
            return back()->with('error', 'No se pudieron cargar los planes.');
        }
    }
}
