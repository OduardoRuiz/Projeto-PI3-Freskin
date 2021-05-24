@extends('layouts.store')
@section('content')
<h2>Lista de Pedidos</h2>
<div class="mx-5">
    <div class="accordion">
        @foreach(\App\Models\Order::where('user_id','=',Auth()->user()->id)->get() as $order)
        <div class="accordion-item">
            <div class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#item-{{ $order->id }}">
                    Pedido {{ $order->status }}
                </button>
            </div>
            <div class="accordion-collapse collapse" id="item-{{ $order->id }}">
                <div class="accordion-body">
                    <div>
                        <p>{{ $order->address }}, {{ $order->address_number }}, {{ $order->address_city }} - {{ $order->address_state}}</p>
                        <p>Pago com o cartão: *{{ $order->cc_number }}</p>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th></th>
                                <th>Quantidade</th>
                                <th>Preço</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @php
                            $total = 0;
                            @endphp
                            @foreach($order->items() as $item)
                            <tr class="fs-5">
                                <td><img src="{{ asset($item->product()->image) }}" style="width:100px"></td>
                                <td><a href="{{ route('product.show', $item->product()->id) }}">{{ $item->product()->name }}</a></td>
                                <td><span> {{ $item->qtds }}</span></td>
                                <td>
                                    <span> R$ {{ number_format($item->price * $item->qtds, 2, ',' , '.') }} (R$ {{ number_format($item->price,2, ',' , '.') }})</span>
                                </td>
                            </tr>
                            @php
                            $total += ($item->price * $item->qtds);
                            @endphp
                            @endforeach
                        </tbody>
                        <div><p>Total da compra: R$ {{ number_format($total, 2, ',' , '.') }}</p>
                        </div>
                    </table>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection