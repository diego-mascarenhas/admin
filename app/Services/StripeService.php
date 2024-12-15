<?php

namespace App\Services;

use Stripe\Stripe;
use Stripe\Price;
use Illuminate\Support\Facades\Log;

class StripeService
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    public function getPlans()
    {
        try {
            $prices = Price::all([
                'active' => true,
                'type' => 'recurring',
                'expand' => ['data.product'],
                'limit' => 100
            ]);

            // Filtrar solo los planes de hosting
            $hostingPlans = collect($prices->data)->filter(function($price) {
                return isset($price->product->metadata->type)
                    && $price->product->metadata->type === 'hosting';
            });

            Log::info('Planes de hosting recuperados:', [
                'count' => $hostingPlans->count(),
                'planes' => $hostingPlans
            ]);

            // Convertir de nuevo a objeto tipo Stripe
            $prices->data = $hostingPlans->values()->all();

            return $prices;
        } catch (\Exception $e) {
            Log::error('Error al obtener planes de Stripe: ' . $e->getMessage());
            throw $e;
        }
    }
}
