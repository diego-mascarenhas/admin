@extends('site.app')

@section('content')

<div id="subheader"> <header> <div class="subheader-banner"
	style="background-image:url('/assets/img/cabeceras/cloud-server.jpg');">
	<h1>Lo último en hosting e infraestructura</h1>
		<p>Un plan a la medida de tu proyecto</p>
</div>

<div id="cloud"> <section class="container text-center"> <div class="cloud-descripcion"> <p><strong>Última
	tecnología</strong> en servidores para que tu proyecto logre una <strong>performance
		sobresaliente.</strong><br>
	Experimenta la velocidad con <strong>Cloud Server</strong>.</p>
</div>

<div class="cloud-caracteristicas">
	<div class="container-fluid">
		<div class="row">
			<div class="col col-md-3" style="background-image:url('/assets/img/iconos/velocidad.png');">
				<p><strong>Máxima velocidad</strong></p>
			</div>

			<div class="col col-md-3"
				style="background-image:url('/assets/img/iconos/cloud-server-mayor-espacio.png');">
				<p><strong>Mayor espacio</strong></p>
			</div>

			<div class="col col-md-3" style="background-image:url('/assets/img/iconos/recursos.png');">
				<p><strong>Recursos dedicados</strong></p>
			</div>

			<div class="col col-md-3" style="background-image:url('/assets/img/iconos/dominios-ilimitados.png');">
				<p><strong>Dominios ilimitados</strong></p>
			</div>
		</div>
	</div>
</div>

<div class="cloud-planes margin-b-50">
	<h2 class="section-title margin-b-20"><span>Nuestros planes Cloud</span></h2>
	<h3 class="margin-b-50">Tecnología Cloud Linux con recursos dedicados</h3>
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
<div class="cloud-sctc">
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