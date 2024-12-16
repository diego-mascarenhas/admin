<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Services\StripeService;
use Illuminate\Support\Facades\Log;

class CloudController extends Controller
{
    protected $stripeService;

    public function __construct(StripeService $stripeService)
    {
        $this->stripeService = $stripeService;
    }

    public function index()
    {
        try {
            $planes = $this->stripeService->getPlans('cloud');

            return view('site.cloud', [
                'planes' => $planes->data
            ]);
        } catch (\Exception $e) {
            Log::error('Error en CloudController: ' . $e->getMessage());
            return back()->with('error', 'No se pudieron cargar los planes.');
        }
    }
}
