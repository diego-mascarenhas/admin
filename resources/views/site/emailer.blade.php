@extends('site.app')

@section('content')

<div id="emailer">
	<section class="container text-center">
		<div class="content-descripcion">
			<h4 class="general-title margin-b-50"><span>¡Comenza hoy mismo!</span></h4>

			<p>Nos envías los contenidos que quieres incluir, tus contactos, la imagen corportativa y Y ya está!
				<strong>Nosotros armamos el newsletter y te proponemos fecha y hora para el envío del mismo.</strong>
			</p>

			<div class="text-center margin-t-30">
				<a href="#planes" class="scroll-to button button-medium bc-red-4 margin-t-10 inline margin-5">Ver
					planes</a>
				<a href="/contactenos/'); ?>"
					class="button button-medium bc-blue-5 margin-t-10 inline margin-5">Contactar</a>
			</div>
		</div>

		<div class="content-caracteristicas margin-b-50">
			<div class="container-fluid">
				<div class="row">
					<div class="col col-sm-6 col-md-3">
						<div class="v-aling">
							<img src="/assets/img/iconos/control-envio.png">
							<p><strong>Control de envío para que no hagas spam</strong></p>
						</div>
					</div>

					<div class="col col-sm-6 col-md-3">
						<img src="/assets/img/iconos/campanas.png">
						<p><strong>Creación de campañas de forma sencilla</strong></p>
					</div>

					<div class="col col-sm-6 col-md-3">
						<img src="/assets/img/iconos/control-envio.png">
						<p><strong>Confidencialidad con tus datos</strong></p>
					</div>

					<div class="col col-sm-6 col-md-3">
						<img src="/assets/img/iconos/seguridad.png">
						<p><strong>Estadísticas detalladas de tus envíos</strong></p>
					</div>
				</div>

				<div class="row border-bottom-0">
					<div class="col col-sm-6 col-md-3">
						<img src="/assets/img/iconos/control-envio.png">
						<p><strong>Listas de contactos</strong></p>
					</div>

					<div class="col col-sm-6 col-md-3">
						<img src="/assets/img/iconos/autodepuracion.png">
						<p><strong>Auto depuración de listas</strong></p>
					</div>

					<div class="col col-sm-6 col-md-3">
						<img src="/assets/img/iconos/seguimientos-links.png">
						<p><strong>Seguimientos de links</strong></p>
					</div>

					<div class="col col-sm-6 col-md-3">
						<img src="/assets/img/iconos/ips-adicionales.png">
						<p><strong>IPs adicionales para envíos</strong></p>
					</div>
				</div>
			</div>
		</div>

		<div id="planes" class="cloud-planes margin-b-50">
			<h2 class="section-title margin-b-50"><span>Planes de envío</span></h2>
			<div class="container-fluid">
				<div class="row">
					<?php // foreach ($planes ?? '' as $item) { ?>
						<?php // $caracteristicas = json_decode($item['caracteristicas'], true); ?>
						<div class="col col-md-3 margin-b-15">
							<div class="planCommon">
								<?php // include('plan_template.php'); ?>
							</div>
						</div>
					<?php // } ?>
				</div>
			</div>
		</div>
	</section>
</div>

@endsection