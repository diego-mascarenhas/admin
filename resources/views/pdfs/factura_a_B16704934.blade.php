<!DOCTYPE html>
<html>

<head>
    <title>revision alpha S.L.</title>
    <style>
    body {
        font-family: 'Helvetica', sans-serif;
        max-width: 21cm;
        max-height: 29.7cm;
        margin: 30;
    }

    #wrap>table td {
        vertical-align: top;
    }

    p,
    td,
    th {
        font-size: 12px;
        line-height: 1.5;
    }

    h2 {
        font-size: 20px;
    }

    h3 {
        font-size: 14px;
    }

    .table-info {
        border: 1px solid #DDD;
        border-radius: 5px;
    }

    .table-info td,
    .table-info th {
        padding: 8px 12px;
    }

    .table-detalle {}

    .table-detalle td,
    .table-detalle th {
        padding: 8px 12px;
    }

    .table-detalle th {
        border-left: 1px solid #DDD;
        border-top: 1px solid #DDD;
        border-bottom: 1px solid #DDD;
    }
    </style>
</head>

<body>
    <style type="text/css">
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    #wrap>table td {
        vertical-align: top;
    }

    p,
    td,
    th {
        font-size: 12px;
        line-height: 1.5;
    }

    h2 {
        font-size: 20px;
    }

    h3 {
        font-size: 14px;
    }

    .table-info {
        border: 1px solid #DDD;
        border-radius: 5px;
    }

    .table-info td,
    .table-info th {
        padding: 8px 12px;
    }

    .table-detalle {}

    .table-detalle td,
    .table-detalle th {
        padding: 8px 12px;
    }

    .table-detalle th {
        border-left: 1px solid #DDD;
        border-top: 1px solid #DDD;
        border-bottom: 1px solid #DDD;
    }
    </style>
    <div id="wrap" style="height:100%;">
        <table cellspacing="0">
            <tbody>
                <tr>
                    <td>
                        <table cellspacing="0">
                            <tbody>
                                <tr>
                                    <td style="width:328px;">
                                        <h1><img src="{{ public_path('assets/img/revision-alpha-logo.png') }}"
                                                alt="REVISION ALPHA" height="35"></h1><br>
                                    </td>
                                    <td style="width:100px;">&nbsp;</td>
                                    <td style="width:328px;">
                                        <h2>FACTURA N&deg; {{ $factura->comprobante }}</h2>
                                        <h3>@if($factura->vencimiento)
                                            VTO: {{ \Carbon\Carbon::parse($factura->fecha)->format('d/m/Y') }}
                                            @else
                                            &nbsp;
                                            @endif
                                        </h3><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>revision alpha S.L.<br>
                                            González Besada 39 Of. 4º B, 33007<br>
                                            Oviedo, Principado de Asturias, España.<br>
                                            +34 722.372.858</p>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>
                                        <p><strong>Fecha:</strong> {{
    \Carbon\Carbon::parse($factura->fecha)->format('d/m/Y') }}<br>
                                            <strong>NIF:</strong> B16704934<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <img src="{{ public_path('assets/img/factura-A.jpg') }}" alt="Factura A"
                                            width="752">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr> <!-- FIN Header -->

                <tr>
                    <td height="20"></td>
                </tr>

                <tr>
                    <td>
                        <table cellspacing="0" class="table-info">
                            <tbody>
                                <tr>
                                    <td style="width:520px;">
                                        <p>
                                            <strong>Raz&oacute;n Social:</strong> {{ $factura->razon_social }}<br>
                                            @if($factura->domicilio)
                                            {{ $factura->domicilio }},
                                            {{ $factura->codigo_postal ?? '' }},
                                            {{ $factura->localidad ?? '' }},
                                            {{ $factura->provincia ?? '' }}, {{ $factura->pais ?? '' }}.
                                            @endif
                                        </p>
                                    </td>
                                    <td style="width:144px; padding-left:0; text-align:right">
                                        <p><strong>NIF/CIF:</strong> {{ $factura->cuit }}
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr> <!-- FIN Info -->

                <tr>
                    <td height="20"></td>
                </tr>

                <tr>
                    <td style="height:575px;">
                        <table cellspacing="0" class="table-detalle">
                            <thead>
                                <tr>
                                    <th style="width:532px; border-radius:5px 0px 0px 5px;" align="left">
                                        Descripci&oacute;n</th>
                                    <th style="width:120px; border-right:1px solid #DDD; border-radius:0px 5px 5px 0px;"
                                        align="right">Importe</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr>
                                    <td align="left">
                                        <div style="width:520px;">{{ $item->descripcion }}</div>
                                    </td>
                                    <td align="right">{{ $item->valor }}€</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr> <!-- FIN Detalle -->

                <tr>
                    <td style="height:50px;">
                        <table cellspacing="0" class="table-detalle">
                            <tbody>
                                <tr>
                                    <td>
                                        <div style="width:756px; line-height:1.2;">
                                            <em>
                                                Transferencias:<br>
                                                Banco Caja Rural de Asturias<br>
                                                IBAN ES46 3059 0064 7733 1011 2929
                                            </em>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr> <!-- FIN Observaciones -->

                <tr>
                    <td>
                        <table cellspacing="0">
                            <tbody>
                                <tr>
                                    <td>
                                        <table cellspacing="0" class="table-info">
                                            <tbody>
                                                <tr>
                                                    <td style="width:545px;" align="right">
                                                        <p><strong>Subtotal:</strong><br>
                                                            @if($factura->descuento > 0)
                                                            <strong>Descuento:</strong><br>
                                                            @endif
                                                            @if($factura->id_condicion_iva != 4)
                                                            <strong>I.V.A. 21%:</strong><br>
                                                            @endif
                                                            <strong>Importe Total:</strong>
                                                        </p>
                                                    </td>
                                                    <td style="width:112px;" align="right">
                                                        <p>{{ $factura->bruto }}€<br>
                                                            @if($factura->descuento > 0)
                                                            -{{ $factura->descuento }}€<br>
                                                            @if($factura->id_condicion_iva == 4)
                                                            {{ number_format($factura->bruto - $factura->descuento, 2) }}€<br>
                                                            @else
                                                            {{ number_format($factura->bruto - ($factura->descuento * 0.21), 2) }}€<br>
                                                            @endif
                                                            @else
                                                            @if($factura->id_condicion_iva == 4)
                                                            {{ number_format($factura->bruto, 2) }}€<br>
                                                            @else
                                                            {{ number_format($factura->bruto * 0.21, 2) }}€<br>
                                                            @endif
                                                            @endif
                                                            {{ $factura->total_neto }}€</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr> <!-- FIN Footer -->

            </tbody>
        </table>
    </div>
</body>

</html>