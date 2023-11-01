@extends('site.app')

@section('content')

<div id="terminosYCondiciones" class="firstTemplate">
	<section class="container margin-b-50">
		<h3>ACUERDO DE NIVEL DE SERVICIO</h3>
		<p>Un <strong>acuerdo de nivel de servicio</strong> o <strong>ANS</strong> (en inglés Service Level Agreement o SLA), es un acuerdo escrito entre un proveedor de servicio y su cliente con objeto de fijar el nivel acordado para la calidad de dicho servicio.</p>
		
		<h3>Nivel Crítico: Impacto crítico</h3>
		<p>La mayoría de los usuarios afectados, de alta visibilidad.<br>
		<em><small>Ejemplo: caída de servidor.</small></em></p>
		<ul>
			<li>Respuesta en 15 para indicar el problema, gravedad y tiempo estimado de recuperación del servicio.</li>
			<li>Resolución antes de las 4 horas.</li>
		</ul>
		
		<h3>Nivel Urgente: Impacto importante</h3>
		<p>La mayoría de los usuarios afectados, de alta visibilidad, hay solución alternativa.<br>
		<em><small>Ejemplo: Problema específico en aplicación debido a un problema de sistema.</small></em></p>
		<ul>
			<li>Respuesta en 30 para indicar el problema, gravedad y tiempo estimado de recuperación del servicio.</li>
			<li>Resolución antes de las 8 horas.</li>
		</ul>
		
		<h3>Nivel Alto: Impacto Moderado</h3>
		<p>Sólo uno o escaso número de usuarios afectados, visibilidad limitada.<br>
		<em><small>Ejemplo: Un solo usuario no puede acceder a la aplicación.</small></em></p>
		<ul>
			<li>Respuesta entre las 4 y 8 horas para indicar el problema, gravedad y tiempo estimado de recuperación del servicio.</li>
			<li>Resolución antes de los 2 días.</li>
		</ul>
		
		<h3>Nivel Normal: Impacto menor</h3>
		<p>Los usuarios tienen funcionalidad y rendimiento normal al implementarse solución temporaria.<br>
		<em><small>Ejemplo: Degradación del servidor.</small></em></p>
		<ul>
			<li>Respuesta en 30 para indicar el problema, gravedad y tiempo estimado de recuperación del servicio.</li>
			<li>Resolución antes de los 5 días hábiles.</li>
		</ul>
	</section>
</div>

@endsection
