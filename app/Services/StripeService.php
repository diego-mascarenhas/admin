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

    public function getPlans($type = 'hosting')
    {
        try {
            $prices = Price::all([
                'active' => true,
                'type' => 'recurring',
                'expand' => ['data.product'],
                'limit' => 100
            ]);

            $filteredPlans = collect($prices->data)->filter(function($price) use ($type) {
                return isset($price->product->metadata->type)
                    && $price->product->metadata->type === $type;
            });

            $prices->data = $filteredPlans->values()->all();

            return $prices;
        } catch (\Exception $e) {
            Log::error("Error al obtener planes de {$type} de Stripe: " . $e->getMessage());
            throw $e;
        }
    }
}
