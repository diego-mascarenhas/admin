@extends('site.app')

@section('content')
<div class="container">
    <h2 class="text-center margin-t-40">Listado de Planes y Precios</h2>

    @foreach($productsWithPrices as $item)
        <div class="margin-t-30">
            <h3 class="tc-red-5">{{ $item['product']->name }}</h3>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Moneda</th>
                            <th>Precio</th>
                            <th>Período</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($item['prices'] as $price)
                            <tr>
                                <td>{{ strtoupper($price->currency) }}</td>
                                <td>{{ \App\Helpers\PriceFormatter::format($price->unit_amount, ['symbol' => $price->currency, 'position' => 'after']) }}</td>
                                <td>
                                    @if($price->recurring)
                                        @if($price->recurring->interval === 'month')
                                            Mensual
                                        @elseif($price->recurring->interval === 'year')
                                            Anual
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
</div>
@endsection
