{{-- layout extend --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Facturas')

{{-- vendor styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css"
  href="{{asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/dataTables.checkboxes.css')}}">
@endsection

{{-- page styles --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-invoice.css')}}">
@endsection

{{-- page content --}}
@section('content')
<!-- invoice list -->
<section class="invoice-list-wrapper section">
  <!-- create invoice button-->
  <!-- Options and filter dropdown button-->
  {{--
  <div class="filter-btn">
    <!-- Dropdown Trigger -->
    <a class='dropdown-trigger btn waves-effect waves-light purple darken-1 border-round' href='#' data-target='btn-filter'>
      <span class="hide-on-small-only">Filtrar Factura</span>
      <i class="material-icons">keyboard_arrow_down</i>
    </a>
    <!-- Dropdown Structure -->
    <ul id='btn-filter' class='dropdown-content'>
      <li><a href="#!">Pagada</a></li>
      <li><a href="#!">Pendiente</a></li>
      <li><a href="#!">Pago parcial</a></li>
    </ul>
  </div>
  --}}
  <div class="responsive-table">
    <table class="table invoice-data-table white border-radius-4 pt-1">
      <thead>
        <tr>
          <!-- data table responsive icons -->
          <th></th>
          <!-- data table checkbox -->
          <th></th>
          <th>
            <span>Factura</span>
          </th>
          <th>Fecha</th>
          <th>Razón Social</th>
          <th>Vencimiento</th>
          <th>Valor</th>
          <th>Estado</th>
          <th>Acciones</th>
        </tr>
      </thead>

      <tbody>
      @foreach($facturas as $factura)
        <tr>
          <td></td>
          <td></td>
          <td><a href="{{asset('cms-facturas')}}/{{ $factura->id }}">{{ $factura->comprobante }}</a></td>
          <td>{{ \Carbon\Carbon::parse($factura->fecha)->format('d/m/Y') }}</td>
          <td><span class="invoice-customer">{{ $factura->razon_social }}</span></td>
          <td>{{ \Carbon\Carbon::parse($factura->vencimiento)->format('d/m/Y') }}</td>
          <td><span class="invoice-amount">{{ $factura->total_neto }}{{ $factura->simbolo }}</span></td>
          <td>

            @if ($factura->saldo == 0)
              <span class="chip lighten-5 green green-text">Pagada</span>
            @elseif ($factura->saldo != $factura->total_neto)
              <span class="chip lighten-5 orange orange-text">Pago Parcial</span>
            @else
              <span class="chip lighten-5 red red-text">Sin Pagar</span>
            @endif
          </td>
          <td>
            <div class="invoice-action">
              <a href="{{asset('cms-facturas')}}/{{ $factura->id }}" class="invoice-action-view mr-4">
                <i class="material-icons">remove_red_eye</i>
              </a>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>
@endsection

{{-- vendor scripts --}}
@section('vendor-script')
<script src="{{asset('vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('vendors/data-tables/js/datatables.checkboxes.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-script')
<script src="{{asset('js/scripts/app-invoice.js')}}"></script>
@endsection