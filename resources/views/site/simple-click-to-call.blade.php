@extends('site.app')

@section('content')

<div id="subheader"> <header> <div class="subheader-banner"
	style="background-image:url('/assets/img/cabeceras/simple-click-to-call.jpg');">
	<h1>Tu futuro cliente a un solo Click!</h1>
	<p>Potencia tu negocio con una herramienta indispensable</p>
</div>
</header>
</div>

<div id="simpleClickToCall">
	<section class="container text-center">
		<div class="simpleClickToCall-descripcion">
			<p><strong>Convierte tus visitantes en clientes brindando un servicio de respuesta rápida y
					eficiente.</strong><br>Aumenta tus ventas, mejora tu área de atención al cliente y potencia el
				contacto con tus clientes.</p>
		</div>

		<div class="simpleClickToCall-como-funciona">
			<h2 class="section-title margin-b-50"><span>¿Cómo funciona?</span></h2>

			<div class="container-fluid">
				<div class="row">
					<div class="col col-md-4">
						<article>
							<img src="/assets/img/sctc-paso-1.png">
							<p>Colocas una línea de código en tu sitio web para generar el botón.</p>
						</article>
					</div>

					<div class="col col-md-4">
						<article>
							<img src="/assets/img/sctc-paso-2.png">
							<p>Tus clientes ingresan su teléfono y hacen click en el botón de tu sitio.</p>
						</article>
					</div>

					<div class="col col-md-4">
						<article>
							<img src="/assets/img/sctc-paso-3.png">
							<p>El sistema hace un llamado al número ingresado y otro a tu teléfono comunicando ambas
								partes.</p>
						</article>
					</div>
				</div>
			</div>
		</div>

		<div class="simpleClickToCall-caracteristicas">
			<div class="container-fluid">
				<div class="row">
					<div class="col col-md-3"
						style="background-image:url('/assets/img/iconos/auditoria-consultoria.png');">
						<p><strong>Número propio para indentificación de sus llamadas</strong></p>
					</div>

					<div class="col col-md-3" style="background-image:url('/assets/img/iconos/marketing-digital.png');">
						<p><strong>Notificación por email de cada llamada</strong></p>
					</div>

					<div class="col col-md-3" style="background-image:url('/assets/img/iconos/recursos.png');">
						<p><strong>Configuración de horarios de atención</strong></p>
					</div>

					<div class="col col-md-3" style="background-image:url('/assets/img/iconos/estadisticas.png');">
						<p><strong>Reporte online de las llamadas</strong></p>
					</div>
				</div>
			</div>
		</div>

		<div class="simpleClickToCall-por-que">
			<h2 class="section-title margin-b-50"><span>Por qué contratar Simple Click To Call</span></h2>

			<ul>
				<li>Configuramos el botón en tu página <strog>GRATIS!</strog>
				</li>
				<li>Soporte al instante en horario comercial</li>
				<li>El servicio se brinda a través de la red de telefonía tradicional facilitando el uso y mejorando la
					calidad de la voz en comparación con la telefonía sobre Internet</li>
			</ul>
		</div>

		<!-- <div class="simpleClickToCall-planes">
			<h2 class="section-title margin-b-50"><span>Elige tu plan</span></h2>

			<div class="container-fluid">
				<div class="row">
					<?php // foreach ($planes ?? '' as $item) { ?>
					<?php // $caracteristicas = json_decode($item['caracteristicas'], true); ?>
					<div class="col col-md-4">
						<div class="planCommon">
							<?php // include ('plan_template.php'); ?>
						</div>
					</div>
					<?php // } ?>
				</div>
			</div>
		</div> -->

		<div class="simpleClickToCall-sctc">
			<h2 class="section-title margin-b-50"><span>¡Comienza hoy mismo!</span></h2>

			<div class="sctcCommon">
				<p>Si tienes alguna duda haz click en el botón a continuación<br>para contactarte de manera inmediata
				</p>
				<a href="https://wa.me/34722372858?text=Hola quisiera consultar por" target="_blank"
					title="Contacta por Whatsapp" class="button button-large margin-auto bc-blue-5 margin-t-30">Click To
					Call</a>
			</div>
		</div>
	</section>
</div>

@endsection