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
								<!-- Aquí irían las características específicas de cloud -->
								<strong>{{ $product->metadata->storage ?? '100' }} GB</strong> de almacenamiento<br>
								<strong>{{ $product->metadata->webs ?? '1' }}</strong> sitios web<br>
								<strong>{{ $product->metadata->cpu ?? '2' }}</strong> vCPUs<br>
								<strong>{{ $product->metadata->memory ?? '4' }} GB</strong> de memoria RAM<br>
								@if(isset($product->metadata->panel) && $product->metadata->panel)
									Panel de control <strong>{{ $product->metadata->panel }}</strong><br>
								@endif
								Backups {{ $product->metadata->backups == 1 ? 'diarios' : 'semanales' }}<br>
								<br>
								<div style="height: 80px; display: flex; align-items: center; justify-content: center;">
									<small>{{ $product->metadata->description }}</small>
								</div>
								<br>

								@foreach ($plans_item->sortBy('unit_amount') as $plan)
									@php
										$currencySymbols = [
											'eur' => ['symbol' => '€', 'position' => 'after'],
											'usd' => ['symbol' => '$', 'position' => 'before'],
											'ars' => ['symbol' => '$', 'position' => 'before']
										];

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
								@endforeach
							</li>
						</ul>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>

<div class="cloud-sctc">
	<div class="sctcCommon">
		<h4>¿No sabes qué plan elegir?</h4>
		<p>Contacta un asesor online que te va a asesorar en el plan indicado para tu proyecto.</p>
		<a href="https://wa.me/34722372858?text=Hola quisiera consultar por" target="_blank"
			title="Contacta por Whatsapp" class="button button-medium margin-auto bc-blue-5 margin-t-30">Contactar</a>
	</div>
</div>
</section>
</div>

@endsection
