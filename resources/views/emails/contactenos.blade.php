@extends('emails.template')

@section('content')

<tr>
	<td>
		<h2 style="font-size:30px; color:#FF6666; border-bottom:1px solid lightgrey;">Contácto desde sitio web</h2>
		<br><br>
	</td>
</tr>
<tr>
	<td>		
		<p>Nombre: <strong>{{ $nombre }}</strong></p>	
		<p>Empresa: {{ $empresa ?? 'No especificó la empresa' }}</p>
		<p>Email: {{ $email }}</p>
		<p>Teléfono: {{ $telefono ?? 'Sin número de teléfono' }}</p>
		<p>Mensaje: {!! $mensaje !!}</p>
		
		<br>
		If you have not made any changes, please inform us of this notification  through <a href="https://www.revisionalpha.es/contactenos/" style="color:#FF6666;">our contact form</a>.
	</td>
</tr>

@endsection