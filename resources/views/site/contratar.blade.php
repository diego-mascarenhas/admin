@extends('site.app')

@section('content')

<div id="subheader"> <header> <div class="subheader-banner"
	style="background-image:url('/assets/img/cabeceras/contacto.jpg');">
	<h1>Alta de plan</h1>
		<p>Nuestro respaldo en todos los servicios</p>
</div>
</header> </div> <div id="contratar" class="firstTemplate"> <section class="container"> <div class="row"> <div
	class="col col-md-8"> <h3 class="section-title section-title-full margin-b-20">Contratar</h3>
<div class="content-contacto margin-b-50">
	@guest
	<p class="margin-b-40">
	Si ya se encuentra registrado en nuestro sitio, inicie sesión antes de continuar con el alta de
	plan. De lo contrario complete los datos de contacto que figuran a continuación.
	<a href="/login?redirect=contratar/plan/"
	class="button button-medium margin-auto bc-red-4 margin-t-40">Acceder</a>
	</p> @else <p class="margin-b-40">Ya se encuentra conectado a nuestro sistema y el plan quedará asociado a su
	empresa.</p>
	@endguest

	@if(session('error'))
	<div class="col-md-12">
	<div class="alert alert-danger" role="alert">
		{{ session('error') }}
		</div>
	</div>
	@elseif(session('success'))
	<div class="col-md-12">
	<div class="alert alert-success" role="alert">
		{{ session('success') }}
		</div>
	</div>
	@endif

	@unless(session('success'))
	<form action="{{ route('contratar.store') }}" method="post"> @csrf <input type="hidden" name="id"
		value="{{ $item->id }}">
		<input type="hidden" name="id_tipo" value="{{ $item->id_tipo }}"> @auth <input type="hidden" name="id_contacto"
			value="{{ auth()->user()->id }}"> <input type="hidden" name="nombre" value="{{ auth()->user()->name }}">
			<input type="hidden" name="email" value="{{ auth()->user()->email }}">
		<input type="hidden" name="razon_social" value="Usuario registrado previamente"> <input type="hidden"
			name="documento" value="Usuario registrado previamente">

		@else
		<div class="row">
		<div class="col-sm-6 form-group">
			<input type="text" name="nombre" placeholder="Nombre y apellido (*)" value="{{ old('nombre') }}"
				class="form-control">
			@error('nombre')
			<div class="text-danger small">{{ $message }}</div>
			@enderror
			</div> <div class="col-sm-6 form-group">
			<input type="text" name="empresa" placeholder="Empresa" value="{{ old('empresa') }}" class="form-control">
			@error('empresa')
			<div class="text-danger small">{{ $message }}</div>
			@enderror
			</div> </div> <div class="row">
			<div class="col-sm-6 form-group">
			<input type="email" name="email" placeholder="Email (*)"
			value="{{ old('email') }}"
			class="form-control">
			@error('email')
			<div class="text-danger small">{{ $message }}</div>
			@enderror
			</div>

			<div class="col-sm-6 form-group">
			<input type="text" name="telefono" placeholder="Teléfono"
			value="{{ old('telefono') }}"
			class="form-control">
			@error('telefono')
			<div class="text-danger small">{{ $message }}</div>
			@enderror
			</div>
		</div>
		<div class="row"> <div class="col-sm-6 form-group"> <input type="text" name="razon_social"
			placeholder="Razón Social (*)" value="{{ old('razon_social') }}" class="form-control">
			@error('razon_social') <div class="text-danger small">{{ $message }}</div> @enderror </div>

			<div class="col-sm-6 form-group"> <input type="text" name="documento" placeholder="NIF/CIFF (*)" value="{{
				old('documento') }}" class="form-control"> @error('documento') <div class="text-danger small">{{
					$message }}</div>
				@enderror </div>
				</div>
				@endauth

				<h4 class="form-subtitle">Detalles del plan</h4>
				<p class="margin-b-20">Ha seleccionado <strong>
						<?php echo $item['descripcion']; ?>
				</strong>. A continuación se detallan las características</p>

				<div class="row">
					<div class="col-sm-6 form-group">
						<div class="planCommon">
							@include('site/plan_template')
						</div>
					</div>

					@if ($item->id_tipo == 1 || $item->id_tipo == 2)
					<div class="col-sm-6 form-group">
						<input type="text" name="dominio" id="dominio" placeholder="Dominio (*)"
							value="{{ old('dominio') }}" class="form-control">
						@error('dominio')
						<div class="text-danger small">{{ $message }}</div>
						@enderror
					</div>
					@endif
				</div>

				<div class="form-group terminos">
					<p><input type="checkbox" name="terminos" value="1" class="margin-r-5" <?php echo
							(isset($detalle['terminos'])) ? 'checked' : null; ?>> Acepto todos los <a class="link"
							href="/terminos-y-condiciones" target="_blank">términos y
							condiciones</a>.</p>
				@error('terminos')
				<div class="text-danger small">{{ $message }}</div>
				@enderror
			</div>

			<div class="form-group text-right">
				<input type="text" name="cupon" placeholder="Cupón de descuento" value="{{ old('cupon') }}"
					class="form-control inline margin-b-10" style="width:200px; vertical-align:top;">
				<button type="submit" class="button bc-red-4 inline margin-l-5 margin-b-10">Confirmar</button>

				<div class="clear"></div>
			</div>
	</form>
	@endunless
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