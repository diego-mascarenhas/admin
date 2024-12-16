@extends('site.app')

@section('content')

<div id="subheader"> <header> <div class="subheader-banner"
	style="background-image:url('/assets/img/cabeceras/web-hosting.jpg');">
	<h1>El espacio que tu Página web necesita</h1>
		<p>Te brindamos el mejor servicio de hosting del mercado</p>
</div>
</div> </header> <div id="hosting"> <section class="container text-center"> <div class="hosting-caracteristicas"> <div
	class="container-fluid"> <div class="row"> <div class="col col-md-6"> <article
	style="background-image:url('/assets/img/iconos/panel-de-control.png');">
<h4>El
	Panel de Control más intuitivo</h4>
<p>Con cPanel podrás gestionar y configurar cada recurso de tu alojamiento web en forma
	simple y sencilla.</p>
</article>
</div>

<div class="col col-md-6">
	<article style="background-image:url('/assets/img/iconos/migracion.png');">
		<h4>Migración gratuita</h4>
		<p>Te ayudamos a trasladar tu sitio hacia nuestros servidores sin que tengas que hacer nada.
		</p>
	</article>
</div>
</div>

<div class="row">
	<div class="col col-md-6">
		<article style="background-image:url('/assets/img/iconos/velocidad.png');">
			<h4>Velocidad sorprendente</h4>
			<p>Nuestros servidores están equipados con hardware de última generación lo que significa en
				mayor velocidad para tu sitio.</p>
		</article>
	</div>

	<div class="col col-md-6">
		<article style="background-image:url('/assets/img/iconos/seguridad.png');">
			<h4>Máxima seguridad</h4>
			<p>Garantizamos la privacidad de sus archivos contra cualquier tipo de ataque informático.
			</p>
		</article>
	</div>
</div>

<div class="row">
	<div class="col col-md-6">
		<article style="background-image:url('/assets/img/iconos/auditoria-consultoria.png');">
			<h4>Asesoramiento profesional</h4>
			<p>Contamos con un centro de atención las 24hs para dar soluciones rápidas y efectivas a tus
				necesidades.</p>
		</article>
	</div>

	<div class="col col-md-6">
		<article style="background-image:url('/assets/img/iconos/backups.png');">
			<h4>Backups</h4>
			<p>Tu información y tus mails nunca se perderán. Realizamos backups diarios de tu sitio.</p>
		</article>
	</div>
</div>
</div>
</div>

<div class="hosting-planes margin-b-50">
    <h2 class="section-title margin-b-50"><span>Nuestros planes</span></h2>
    <div class="container-fluid">
        <div class="row">
            @php
                $groupedItems = collect($planes)
                    ->groupBy(function($plan) {
                        return $plan->product->id;
                    })
                    ->sortBy(function($plans_item) {
                        return $plans_item->min('unit_amount');
                    });
            @endphp

            @foreach ($groupedItems as $plans_item)
                @php
                    $product = $plans_item->first()->product;
                @endphp

                <div class="col col-md-4">
                    <div class="planCommon">
                        <ul>
                            <li class="bc-{{ $product->metadata->color ?? 'red' }}-5">
                                <h3>{{ $product->metadata->name ?? $product->name }}</h3>
                            </li>
                            <li>
                                <em>{{ $product->metadata->subtitle ?? '' }}</em><br><br>
                                <strong>{{ $product->metadata->storage ?? '30' }} GB</strong> de espacio<br>
                                @if($product->metadata->transfer === 'unlimited')
                                    Transferencia mensual <strong>sin límites</strong><br>
                                @else
                                    {{ $product->metadata->transfer ?? '5' }} GB de transferencia mensual<br>
                                @endif
                                @if($product->metadata->emails === 'unlimited')
                                    Cuentas de <strong>emails ilimitadas</strong><br>
                                @elseif(isset($product->metadata->emails))
                                    {{ $product->metadata->emails }} Cuenta{{ $product->metadata->emails > 1 ? 's' : '' }} de <strong>emails</strong><br>
                                @else
                                    <span style="text-decoration: line-through;">Cuentas de emails</span><br>
                                @endif
                                @if(isset($product->metadata->panel) && $product->metadata->panel)
                                    Panel de control <strong>cPanel</strong><br>
                                @else
                                    <span style="text-decoration: line-through;">Panel de control</span><br>
                                @endif
                                Backups {{
                                    isset($product->metadata->backups) ?
                                        ($product->metadata->backups == 1 ? 'diarios' :
                                         ($product->metadata->backups == 2 ? 'cada 48 hs' : 'semanales'))
                                    : 'semanales'
                                }}<br>
                                @if(isset($product->metadata->domain) && $product->metadata->domain)
                                    <strong>Dominio</strong> gratis por un año<br>
                                @else
                                    <span style="text-decoration: line-through;">Dominio gratis por un año</span><br>
                                @endif
                                Certificado <strong>SSL</strong><br>
                                @if(isset($product->metadata->plugins) && $product->metadata->plugins)
                                    Actualización de <strong>Plugins</strong><br>
                                @endif
                                @if(isset($product->metadata->monitoring) && $product->metadata->monitoring)
                                    Monitoreo de <strong>vulnerabilidades</strong><br>
                                @endif
                                @if(isset($product->metadata->seo) && $product->metadata->seo)
                                    Alta en Buscadores <strong>(SEO)</strong><br>
                                @endif
                                <br>
                                <div style="height: 80px; display: flex; align-items: center; justify-content: center;">
                                    <small>{{ $product->metadata->description }}</small>
                                </div>
                                <br>

                                @php
                                    $currencySymbols = [
                                        'eur' => ['symbol' => '€', 'position' => 'after'],
                                        'usd' => ['symbol' => '$', 'position' => 'before'],
                                        'ars' => ['symbol' => '$', 'position' => 'before']
                                    ];
                                    $configuredCurrency = config('services.stripe.currency', 'eur');
                                @endphp

                                @foreach ($plans_item->sortBy('unit_amount') as $plan)
                                    @if($plan->currency === $configuredCurrency)
                                        @php
                                            $amount = $plan->unit_amount / 100;
                                            if ($plan->recurring->interval === 'year') {
                                                $amount = $amount / 12;
                                            } elseif ($plan->recurring->interval === 'quarter') {
                                                $amount = $amount / 3;
                                            } elseif ($plan->recurring->interval === 'semester') {
                                                $amount = $amount / 6;
                                            }

                                            $currency = $currencySymbols[$plan->currency] ?? ['symbol' => $plan->currency, 'position' => 'after'];
                                        @endphp

                                        @if($plan->recurring->interval === 'month')
                                            <p class="price" style="font-size: 1.4em;">
                                                <span class="tc-{{ $product->metadata->color ?? 'red' }}-5" style="text-decoration: line-through;">
                                                    <strong>
                                                        @if($currency['position'] === 'before')
                                                            {{ $currency['symbol'] }}{{ str_replace('.', ',', number_format($amount, 2)) }}
                                                        @else
                                                            {{ str_replace('.', ',', number_format($amount, 2)) }}{{ $currency['symbol'] }}
                                                        @endif
                                                    </strong>
                                                </span>
                                                <span class="iva">
                                                    <small>
                                                        <em>+ I.V.A. por mes</em>
                                                    </small>
                                                </span>
                                                <a href="#" onclick="event.preventDefault(); document.getElementById('form-monthly-{{ $plan->id }}').submit();"
                                                   style="font-size: 0.5em; text-decoration: none; color: #666; margin-top: 5px; display: inline-block; font-style: italic;">
                                                    Contratar mensualmente »
                                                </a>
                                                <form id="form-monthly-{{ $plan->id }}" action="/create-checkout-session" method="POST" style="display: none;">
                                                    @csrf
                                                    <input type="hidden" name="price_id" value="{{ $plan->id }}">
                                                </form>
                                            </p>
                                        @else
                                            <p class="price">
                                                <span class="tc-{{ $product->metadata->color ?? 'red' }}-5">
                                                    <strong>
                                                        @if($currency['position'] === 'before')
                                                            {{ $currency['symbol'] }}{{ str_replace('.', ',', number_format($amount, 2)) }}
                                                        @else
                                                            {{ str_replace('.', ',', number_format($amount, 2)) }}{{ $currency['symbol'] }}
                                                        @endif
                                                    </strong>
                                                </span>
                                                <span class="iva">
                                                    <small>
                                                        <em>+ I.V.A. por mes con pago anual</em>
                                                    </small>
                                                </span>
                                            </p>

                                            <form action="/create-checkout-session" method="POST" style="display: inline;">
                                                @csrf
                                                <input type="hidden" name="price_id" value="{{ $plan->id }}">
                                                <button type="submit" class="button button-medium margin-auto bc-red-4 margin-t-40">
                                                    contratar
                                                </button>
                                            </form>
                                        @endif
                                    @endif
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="hosting-sctc">
    <div class="sctcCommon">
        <h4>¿No sabes qué plan elegir?</h4>
        <p>Contacta un asesor online que te va a asesorar en el plan indicado para tu proyecto.</p>
        <a href="#" class="button button-medium margin-auto bc-blue-5 margin-t-30">CONTACTAR</a>
    </div>
</div>
</section>
</div>

@endsection
