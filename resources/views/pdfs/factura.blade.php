<!DOCTYPE html>
<html>
<head>
    <title>revision alpha - Factura</title>
</head>
<body>
    <section class="invoice-view-wrapper section">
  <div class="row">
    <!-- invoice view page -->
    <div class="col xl9 m8 s12">
      <div class="card">
        <div class="card-content invoice-print-area">
          <!-- header section -->
          <div class="row invoice-date-number">
            <div class="col xl4 s12">
              <span class="invoice-number mr-1">Factura</span>
              <span>{{ $factura->comprobante }}</span>
            </div>
            <div class="col xl8 s12">
              <div class="invoice-date display-flex align-items-center flex-wrap">
                <div class="mr-3">
                  <small>Fecha:</small>
                  <span>{{ \Carbon\Carbon::parse($factura->fecha)->format('d/m/Y') }}</span>
                </div>

                @if($factura->vencimiento)
                <div>
                  <small>Vencimiento:</small>
                  <span>{{ \Carbon\Carbon::parse($factura->vencimiento)->format('d/m/Y') }}</span>
                </div>
                @endif

              </div>
            </div>
          </div>
          <!-- logo and title -->
          <div class="row mt-3 invoice-logo-title">
            <div class="col m6 s12 display-flex invoice-logo mt-1 push-m6">
              <img src="{{asset('assets/img/revision-alpha-logo.png')}}" alt="logo">
            </div>
            <div class="col m6 s12 pull-m6">
              <h4 class="indigo-text">Factura</h4>
              <span>Hosting & Software Development</span>
            </div>
          </div>
          <div class="divider mb-3 mt-3"></div>
          <!-- invoice address and contact -->
          <div class="row invoice-info">
            <div class="col m6 s12">
              <h6 class="invoice-from">REVISION ALPHA S.L.</h6>
              <div class="invoice-address">
                <span>NIF: B16704934</span>
              </div>
              <div class="invoice-address">
                <span>González Besada 39, Oviedo, Asturias</span>
              </div>
            </div>
            <div class="col m6 s12">
              <div class="divider show-on-small hide-on-med-and-up mb-3"></div>
              <h6 class="invoice-to">{{ $factura->razon_social }}</h6>
              <div class="invoice-address">
                <span>NIF: {{ $factura->cuit }}</span>
              </div>
            </div>
          </div>
          <div class="divider mb-3 mt-3"></div>
          <!-- product details table-->
          <div class="invoice-product-details">
            <table class="striped responsive-table">
              <thead>
                <tr>
                  <th>Description</th>
                  <th class="right-align">Importe</th>
                </tr>
              </thead>
              <tbody>
                @foreach($items as $item)
                <tr>
                  <td>{{ $item->descripcion }}</td>
                  <td class="indigo-text right-align">{{ $item->valor }}€</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- invoice subtotal -->
          <div class="divider mt-3 mb-3"></div>
          <div class="invoice-subtotal">
            <div class="row">
              <div class="col m5 s12">
                <p>
                  Transferencias:<br>
                  Banco Caja Rural de Asturias<br>
                  IBAN ES46 3059 0064 7733 1011 2929
                </p>
              </div>
              <div class="col xl4 m7 s12 offset-xl3">
                <ul>
                  <li class="display-flex justify-content-between">
                    <span class="invoice-subtotal-title">Subtotal</span>
                    <h6 class="invoice-subtotal-value">{{ $factura->bruto }}€</h6>
                  </li>
                  
                  @if($factura->descuento > 0)
                  <li class="display-flex justify-content-between">
                    <span class="invoice-subtotal-title">Descuento</span>
                    <h6 class="invoice-subtotal-value">-{{ $factura->descuento }}€</h6>
                  </li>
                  @endif

                  <li class="display-flex justify-content-between">
                    <span class="invoice-subtotal-title">I.V.A.</span>
                    <h6 class="invoice-subtotal-value">21%</h6>
                  </li>
                  <li class="divider mt-2 mb-2"></li>
                  <li class="display-flex justify-content-between">
                    <span class="invoice-subtotal-title">Total</span>
                    <h6 class="invoice-subtotal-value">{{ $factura->total_neto }}€</h6>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>