@extends('layouts.store')
@section('css')

<style>
    #banner {
        background: url('https://via.placeholder.com/2000x800px;');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        min-height: 400px;

    }

    .cardimg img {
        border: 0.5px solid gray;
        border-radius: 0.5rem;
        box-shadow: gray;
    }
</style>

@endsection


@section('content')

<div class="d-flex justify-content-center ">
    <h3>Todos os nossos produtos são selecionados com carinho</h3>
</div>

@foreach($tipos as $product)

<div class="col-lg-3 col-md-6 col-sm-10 d-inline-block">
    <div class="text-center cardimg mt-5" style="height: 125px">
        <img src="{{asset($product->image) }}" class="h-100 w-75">
    </div>
    <div class="text-center">
        <span class="d-block fw-bold">{{ $product->name }}</span>
        <span class="d-block">R$ {{$product->price}}</span>
        <div class="mt-2">
            <a href="{{route('product.show', $product->id) }}" class="btn btn-secondary">Visualizar</a>
            <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary">Comprar</a>

        </div>

    </div>

</div>
@endforeach
<div class="d-flex justify-content-center mt-4 ">{{$tipos->links()}}</div>


</section>

@endsection