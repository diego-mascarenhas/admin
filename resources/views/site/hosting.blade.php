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
			@foreach ($planes as $item)
			<div class="col col-md-4">
				<div class="planCommon">
					@include('site/plan_template')
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>

<?php if (isset($sctc)) { ?>
<div class="hosting-sctc">
	<div class="sctcCommon">
		<h4>¿No sabés qué plan elegir?</h4>
		<p>Contactá un asesor online que te va a asesorar en el plan indicado para tu proyecto.</p>
		<a href="#" class="button button-medium margin-auto bc-blue-5 margin-t-30">Contactar</a>
	</div>
</div>
<?php } ?>
</section>
</div>

@endsection