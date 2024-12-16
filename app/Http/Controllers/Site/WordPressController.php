<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Product;
use Stripe\Price;

class WordPressController extends Controller
{
    public function index()
    {
        try {
            Stripe::setApiKey(config('services.stripe.secret'));

            // Obtener el producto específico de WordPress
            $product = Product::retrieve('prod_RPVdLIBYzaIPZH');

            // Obtener los precios asociados a este producto
            $prices = Price::all([
                'product' => 'prod_RPVdLIBYzaIPZH',
                'active' => true,
                'currency' => config('services.stripe.currency', 'eur')
            ]);

            return view('site.wordpress.index', [
                'metaTitle' => 'WordPress Actualizado vs Desactualizado | Revision Alpha',
                'metaDescription' => 'Descubre las ventajas y desventajas de mantener WordPress actualizado. Aprende por qué es crucial mantener tu sitio al día.',
                'product' => $product,
                'prices' => $prices->data
            ]);
        } catch (\Exception $e) {
            \Log::error('Error al obtener producto WordPress: ' . $e->getMessage());
            return view('site.wordpress.index', [
                'metaTitle' => 'WordPress Actualizado vs Desactualizado | Revision Alpha',
                'metaDescription' => 'Descubre las ventajas y desventajas de mantener WordPress actualizado. Aprende por qué es crucial mantener tu sitio al día.',
            ]);
        }
    }
}
