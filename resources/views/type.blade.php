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

<h1>aquiiii</h1>
    @foreach($tipos as $product)

    <div class="col-lg-3 col-md-6 col-sm-10 d-inline-block">
        <div class="text-center cardimg" style="height: 150px">
            <img src="{{asset($product->image) }}" class="h-100">
        </div>
        <div class="text-center">
            <span class="d-block fw-bold">{{ $product->name }}</span>
            <span class="d-block">R$ {{$product->price}}</span>
            <div class="mt-2">
                <a href="{{route('product.show', $product->id) }}" class="btn btn-secondary">Visualizar</a>
                <a href="#" class="btn btn-primary">Comprar</a>

            </div>

        </div>
        
    </div>
    @endforeach
    
</section>

@endsection
