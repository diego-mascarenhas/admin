@extends('site.app')

@section('content')

<div id="subheader"> <header> <div class="subheader-banner"
	style="background-image:url('/assets/img/cabeceras/contacto.jpg');">
	<h1>Envíanos tu consulta</h1>
		<p>Te asesoramos para hacer exitoso tu proyecto</p>
</div>
</header>
</div>

<div id="contactenos" class="firstTemplate">
	<section class="container">
		<div class="row">
			<div class="col col-md-8">
				<h3 class="section-title section-title-full margin-b-20">Contáctenos!</h3>

				<div class="content-contacto margin-b-50">
					<p class="margin-b-40">Por consultas acerca de cualquiera de nuestros productos o servicios puede
						hacerlo por medio del siguiente formulario:</p>

					<?php if (isset($validation)) : ?>
					<div class="col-12">
						<div class="alert alert-danger" role="alert">
							<?= $validation->listErrors() ?>
						</div>
					</div>
					<?php endif; ?>

					<?php if (isset($form)) { ?>
					<?php if ($form['envio'] == 'ok') { ?>
					<div class="col-md-12">
						<div class="alert alert-success" role="alert">
							El mensaje ha sido enviado, muchas gracias por contactarse.
						</div>
					</div>

					<?php } elseif ($form['envio'] == 'error') { ?>
					<div class="col-md-12">
						<div class="alert alert-danger" role="alert">
							Se produjo un error al querer enviar el formulario, por favor prueba más tarde.
						</div>
					</div>
					<?php } ?>

					<?php } else { ?>
					<form action="{{ route('enviar.email') }}" method="post">
						@csrf
						<div class="row">
							<div class="col-sm-6 form-group">
								<input type="text" name="nombre" placeholder="Nombre y apellido (*)"
									class="form-control" id="nombre" value="{{ old('nombre') }}">
									@error('nombre')
        <div class="text-danger">{{ $message }}</div>
    @enderror
							</div>

							<div class="col-sm-6 form-group">
								<input type="text" name="empresa" placeholder="Empresa"
									class="form-control" id="empresa" value="{{ old('empresa') }}">
									@error('empresa')
        <div class="text-danger">{{ $message }}</div>
    @enderror
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6 form-group">
								<input type="email" name="email" placeholder="Email (*)"
									class="form-control" id="email" value="{{ old('email') }}">
									@error('email')
        <div class="text-danger">{{ $message }}</div>
    @enderror
							</div>

							<div class="col-sm-6 form-group">
								<input type="text" name="telefono" placeholder="Teléfono"
									class="form-control" id="telefono" value="{{ old('telefono') }}">
									@error('telefono')
        <div class="text-danger">{{ $message }}</div>
    @enderror
							</div>
						</div>

						<div class="form-group">
							<textarea name="mensaje" placeholder="Mensaje (*)"
								class="form-control"><?php echo (isset($detalle['mensaje'])) ? $detalle['mensaje'] : null; ?></textarea>
						</div>

						<div class="form-group text-right">
							<button type="submit" class="button bc-red-4 inline">Enviar</button>
						</div>
					</form>
					<?php } ?>

				</div>
			</div>

			<div class="col col-md-4 hidden-xs hidden-sm">
				<h3 class="section-title section-title-full margin-b-20">Vías de contacto</h3>

				<div class="content-informacion margin-b-50">
					@include('site/sidebar_vias_de_contacto')
				</div>
			</div>
		</div>
	</section>
</div>

@endsection