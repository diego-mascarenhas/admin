@extends('emails.template')

@section('content')

<tr>
	<td>
		<h2 style="font-size:30px; color:#FF6666; border-bottom:1px solid lightgrey;">Alta de Servicio</h2> <br> <br>
			</td> </tr> <tr> <td> <p>Nombre: {{ $nombre }}</p>
			<p>Empresa: {{ $empresa ?? 'No especificó la empresa' }}</p> <p>Razón Social: {{ $razon_social }}</p> <p>
				Documento: {{ $documento }}</p>
				<p>Email: {{ $email }}</p> <p>Contraseña: {{ $password }}</p> <p>Teléfono: {{ $telefono ?? 'No ingresó
					el teléfono' }}</p>
					<p>Plan: {{ $id }}</p>
					@if(isset($dominio)) <p>Dominio: {{ $dominio }}</p>
					@endif
					<p>Cupón: {{ $cupon ?? 'No posée cupón de descuento' }}</p>
					</td> </tr> @endsection