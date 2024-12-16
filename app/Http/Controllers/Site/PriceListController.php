<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Stripe\Stripe;
use Stripe\Price;
use Stripe\Product;

class PriceListController extends Controller
{
    public function index()
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $products = Product::all(['active' => true]);

            $productsWithPrices = [];
            foreach ($products as $product) {
                // Obtener todos los precios sin filtrar por moneda
                $prices = Price::all([
                    'product' => $product->id,
                    'active' => true,
                    'limit' => 100 // Aumentar el límite para asegurar obtener todos los precios
                ]);

                // Verificar que tenemos precios
                if (!empty($prices->data)) {
                    $productsWithPrices[] = [
                        'product' => $product,
                        'prices' => $prices->data
                    ];
                }
            }

            return view('site.prices.index', [
                'productsWithPrices' => $productsWithPrices
            ]);
        } catch (\Exception $e) {
            \Log::error('Error al obtener precios: ' . $e->getMessage());
            return back()->with('error', 'Error al obtener los precios: ' . $e->getMessage());
        }
    }
}
