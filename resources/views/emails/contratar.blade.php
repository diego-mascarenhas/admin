@extends('emails.template')

@section('content')

<tr>
	<td>
		<h2 style="font-size:30px; color:#FF6666; border-bottom:1px solid lightgrey;">Alta de Servicio</h2>
		<br><br>
	</td>
</tr>
<tr>
	<td>		
		<p>Nombre: <strong>{{ $nombre }}</strong></p>	
		<p>Empresa: {{ $empresa ?? 'No especificó la empresa' }}</p>
		<p>Email: {{ $email }}</p>
		<p>Teléfono: {{ $telefono ?? 'No ingresó el teléfono' }}</p>
		<p>Plan: {{ $id_plan }}</p>
		@if(isset($dominio))
			<p>Dominio: {{ $dominio }}</p>
		@endif
		<p>Cupón: {{ $cupon ?? 'No posée cupón de descuento' }}</p>
	</td>
</tr>

@endsection