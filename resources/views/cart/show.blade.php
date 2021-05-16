@extends('layouts.store')
@section('content')
<h2>Carrinho de compras</h2>
<div class="mx-5">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Produto</th>
                <th></th>
                <th>Quantidade</th>
                <th></th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody class="align-middle">
            @php
            $total = 0;
            @endphp
            @foreach($cart as $item)
            <tr>
                <td><img src="{{asset($item->product()->image)}}" alt="" style="width:150px"></td>
                <td><a href="{{ route('product.show', $item->product()->id)}}">{{$item->product()->name}}</a></td>
                <td><span>{{$item->quantity}}</span></td>
                <td>
                    <a href="{{ route('cart.add', $item->product()->id) }}" class="btn btn btn-success">+</a>
                    <a href="{{ route('cart.remove',$item->product()->id) }}" class="btn btn btn-warning">-</a>
                </td>
                <td>
                    <span>R$ {{ $item ->product()->price * $item->quantity }} (R$ {{ $item->product()->price}})</span>
                    @php
                    $total += $item->product()->price *$item->quantity;
                    @endphp
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="d-flex flex-colym flex-wrap align-items-end">
    <span class="h3 max-5">Total da compra: R$ {{$total}}</span>
    <a href="#" class="btn btn-lg btn-primary mx-2"> Ir para pagamento</a>
</div>

@endsection