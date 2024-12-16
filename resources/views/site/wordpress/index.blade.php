@extends('site.app')

@section('content')
    <div id="subheader">
        <header>
            <div class="subheader-banner" style="background-image:url('/assets/img/cabeceras/wordpress.jpg');">
                <h1>WordPress es el CMS más utilizado del mundo,</h1>
                <p>Mantenerlo actualizado es crucial para el éxito de tu sitio web</p>
            </div>
        </header>
    </div>

    <div id="simpleClickToCall">
        <section class="container text-center">
            <div class="hosting-planes margin-b-50">
                <div class="container-fluid">
                    <h2 class="text-center margin-b-40">¿Por qué es importante actualizar WordPress?</h2>

                    <div class="row text-center">
                        <div class="col-md-4">
                            <div class="feature-box padding-20">
                                <h3 class="h4 tc-red-5">Seguridad</h3>
                                <p>Protege tu sitio contra amenazas de seguridad y vulnerabilidades conocidas</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-box padding-20">
                                <h3 class="h4 tc-red-5">Rendimiento</h3>
                                <p>Mejoras en velocidad y optimización del rendimiento general</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-box padding-20">
                                <h3 class="h4 tc-red-5">Compatibilidad</h3>
                                <p>Asegura la compatibilidad con plugins y temas actualizados</p>
                            </div>
                        </div>
                    </div>

                    <div class="row text-center margin-t-20">
                        <div class="col-md-4">
                            <div class="feature-box padding-20">
                                <h3 class="h4 tc-red-5">Correcciones</h3>
                                <p>Solución de errores y bugs del sistema</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-box padding-20">
                                <h3 class="h4 tc-red-5">Nuevas Funciones</h3>
                                <p>Aprovecha las últimas funcionalidades y mejoras</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-box padding-20">
                                <h3 class="h4 tc-red-5">SEO</h3>
                                <p>Mejor posicionamiento en buscadores</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <h2 class="section-title margin-b-30"><span>Nuestro Servicio de Mantenimiento</span></h2>

                <ul class="list-unstyled" style="font-size: 1.1em; line-height: 1.8;">
                    <li class="margin-b-10">Actualizaciones regulares del core de WordPress</li>
                    <li class="margin-b-10">Actualización de plugins y temas</li>
                    <li class="margin-b-10">Copias de seguridad antes de cada actualización</li>
                    <li class="margin-b-10">Monitoreo de seguridad 24/7</li>
                    <li class="margin-b-10">Soporte técnico especializado</li>
                </ul>

                @php
                    $currencySymbols = [
                        'eur' => ['symbol' => '€', 'position' => 'after'],
                        'usd' => ['symbol' => '$', 'position' => 'before'],
                        'ars' => ['symbol' => '$', 'position' => 'before'],
                    ];
                    $configuredCurrency = config('services.stripe.currency', 'eur');
                    $plan = collect($prices)->first();
                @endphp

                @if(isset($plan) && $plan->currency === $configuredCurrency)
                    <div class="margin-t-40">
                        <span class="tc-red-5" style="font-size: 2.5em;">
                            <strong>
                                {{ str_replace('.', ',', number_format($plan->unit_amount / 100, 2)) }}€
                            </strong>
                        </span>
                        <div class="iva">
                            <small>
                                <em>+ I.V.A. por trimestre</em>
                            </small>
                        </div>
                    </div>
                    <div class="text-center margin-t-30">
                        <form action="/create-checkout-session" method="POST" style="display: inline-block;">
                            @csrf
                            <input type="hidden" name="price_id" value="{{ $plan->id }}">
                            <button type="submit" class="button button-large bc-red-4">
                                CONTRATAR
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </section>
    </div>
@endsection
