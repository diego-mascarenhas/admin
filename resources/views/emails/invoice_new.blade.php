@extends('emails.template')

@section('content')

<tr>
	<td>
		<h2 style="font-size:30px; color:#FF6666; border-bottom:1px solid lightgrey;">Nueva factura</h2>
		<br><br>
	</td>
</tr>
<tr>
	<td>
		<strong>
			{{ $factura->empresa }},
		</strong><br>
		<br>
		Este aviso es para informarle que la factura
		<a href="{{ url('cms-facturas-download', ['hash' => $factura->hash]) }}" style="color:#FF6666;">{{
			$factura->comprobante }}</a> por un valor de
		{{ $factura->total_neto }}{{ $factura->simbolo }}.- ha sido emitida.

		@if($factura->vencimiento)
		<br>
		El vencimiento de la misma es el {{ \Carbon\Carbon::parse($factura->vencimiento)->format('d/m/Y') }}.
		@endif

		<br>
		<br>
		<br>
		Datos de la cuenta a transferir:<br><br>
		<strong>Banco:</strong> Caja Rural de Asturias<br>
		<strong>IBAN:</strong> ES46 3059 0064 7733 1011 2929<br>
		<strong>Titular:</strong> REVISION ALPHA S.L.<br>
		<br>

		Para ver el estado de sus servicios y el balance de su cuenta puede hacerlo desde el <a
			href="{{ url('dashboard') }}" style="color:#FF6666;">&aacute;rea de
			clientes</a> de nuestro
		sitio.

		@if(isset($factura->notificacion))
		<br><br>
		<table width="100%" bgcolor="#5CA7D7" border="0" cellpadding="0" cellspacing="10">
			<tr>
				<td>
					<span style="color:#FFFFFF;"><strong>IMPORTANTE</strong><br><br>
						{{ $factura->notificacion }}
						<br><br>
						Ante cualquier duda puede contactarse con nosotros a trav&eacute;s de nuestra web:<br>
						<a href="{{ url('dashboard') }}" style="color:inherit">{{ url('dashboard') }}</a><br><br>
						Muchas gracias por su comprensi&oacute;n y confianza.
					</span>
				</td>
			</tr>
		</table>
		@endif

	</td>
</tr>

@endsection