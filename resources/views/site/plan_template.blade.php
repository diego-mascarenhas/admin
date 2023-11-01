<ul>
	<li class="bc-{{ isset($item->caracteristicas['color']) ? $item->caracteristicas['color'] : 'red' }}-5"><h3>{{
	$item->categoria }}</h3>
	<?php if (isset($caracteristicas['imagen'])) { ?><img src="<?php echo
	$caracteristicas['imagen']; ?>" class="imagen-wp">
	<?php } ?>
	</li>
	<li>
		@if ($item->caracteristicas['descripcion'])
		{!! $item->caracteristicas['descripcion'] !!}
			@if (isset($item->caracteristicas['valor_mensual_pago_anual']))
	<p class=" price">
	<span class="tc-{{ isset($item->caracteristicas['color']) ? $item->caracteristicas['color'] : 'red' }}-5"> <strong>{{
		$item->caracteristicas['valor_mensual_pago_anual'] }}</strong> </span> <span class="iva"><small><em>+ I.V.A. por
		mes con pago anual</em></small></span>
		</p> @else <p class=" price"> <span class="tc-{{ isset($item->caracteristicas['color']) ? $item->caracteristicas['color'] : 'red' }}-5"> <strong>{{ $item->caracteristicas['valor_mensual'] }}</strong>
	</span> <span class="iva"><small><em>+ I.V.A. por mes</em></small></span> </p>
	@endif

	@if (Route::currentRouteName() !== 'contratar')
	<a href=" /contratar/{{ $item->id }}"
				class="button button-medium margin-auto bc-red-4 margin-t-40">contratar</a>
				@endif
				@endif
				</li> </ul>