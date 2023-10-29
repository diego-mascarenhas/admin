@extends('site.app')

@section('content')

<div id="subheader"> <header> <div class="subheader-banner"
	style="background-image:url('/assets/img/cabeceras/servidores-dedicados.jpg');">
	<h1>Máximo control, máxima performance</h1>
	<p>Todo el control para tu proyecto online</p>
</div>
</header>
</div>

<div id="servidoresDedicados">
	<section class="text-center">
		<div class="servidoresDedicados-descripcion container">
			<p>Asegúrate lo máximo en performance y control para tu proyecto online<br>eligiendo un <strong>servidor
					dedicado con hardware IBM</strong>.</p>
		</div>

		<div class="servidoresDedicados-caracteristicas">
			<div class="container">
				<h2 class="section-title margin-b-50"><span>¿Por qué un servidor dedicado?</span></h2>

				<div class="container-fluid">
					<div class="row">
						<div class="col col-md-6">
							<article style="background-image:url('/assets/img/iconos/velocidad.png');">
								<h4>Velocidad sorprendente</h4>
								<p>Nuestros servidores están equipados con hardware de última generación lo que
									significa en mayor velocidad para tu sitio.</p>
							</article>
						</div>

						<div class="col col-md-6">
							<article style="background-image:url('/assets/img/iconos/seguridad.png');">
								<h4>Máxima seguridad</h4>
								<p>Garantizamos la privacidad de sus archivos contra cualquier tipo de ataque
									informático.</p>
							</article>
						</div>
					</div>

					<div class="row">
						<div class="col col-md-6">
							<article style="background-image:url('/assets/img/iconos/auditoria-consultoria.png');">
								<h4>Asesoramiento profesional</h4>
								<p>Contamos con un centro de atención las 24hs para dar soluciones rápidas y efectivas a
									tus necesidades.</p>
							</article>
						</div>

						<div class="col col-md-6">
							<article style="background-image:url('/assets/img/iconos/backups.png');">
								<h4>Backups</h4>
								<p>Tu información y tus mails nunca se perderán. Realizamos backups diarios de tu sitio.
								</p>
							</article>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
</div>

@endsection