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
                $productosAgrupados = collect($planes)
                    ->groupBy(function($plan) {
                        return $plan->product->id;
                    })
                    ->sortBy(function($planes_producto) {
                        return $planes_producto->min('unit_amount');
                    });
            @endphp

            @foreach ($productosAgrupados as $planes_producto)
                @php
                    $producto = $planes_producto->first()->product;
                @endphp

                <div class="col col-md-4">
                    <ul>
                        <li class="bc-{{ $producto->metadata->color ?? 'red' }}-5">
                            <h3>{{ $producto->name }}</h3>
                        </li>
                        <li>
                            <p>{{ $producto->metadata->storage ?? '30' }} GB de espacio</p>
                            <p>{{ $producto->metadata->transfer ?? '5' }} GB de transferencia mensual</p>
                            <p>{{ $producto->metadata->emails ?? '1' }} Cuenta{{ $producto->metadata->emails > 1 ? 's' : '' }} de emails</p>
                            <p>Panel de control cPanel</p>
                            <p>Backups semanales</p>
                            <p>Certificado SSL</p>
                            <p>{{ $producto->metadata->credits ?? '500' }} créditos email-Marketing mensuales</p>

                            @foreach ($planes_producto->sortBy('unit_amount') as $plan)
                                <p class="price">
                                    <span class="tc-{{ $producto->metadata->color ?? 'red' }}-5">
                                        <strong>{{ number_format($plan->unit_amount / 100, 2) }}€</strong>
                                    </span>
                                    <span class="iva">
                                        <small>
                                            <em>+ I.V.A. por mes{{ isset($plan->metadata->billing_period) && $plan->metadata->billing_period === 'year' ? ' con pago anual' : '' }}</em>
                                        </small>
                                    </span>
                                </p>

                                @if(Route::currentRouteName() !== 'contratar.create')
                                    <form action="/create-checkout-session" method="POST">
                                        @csrf
                                        <input type="hidden" name="price_id" value="{{ $plan->id }}">
                                        <button type="submit"
                                                class="button button-medium margin-auto bc-{{ $producto->metadata->color ?? 'red' }}-4 margin-t-40">
                                            contratar
                                        </button>
                                    </form>
                                @endif
                            @endforeach
                        </li>
                    </ul>
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
