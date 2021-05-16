@extends('layouts.store')
@section('content')
<section>
    <div class="row py-5">
        <div class="text-center">
            <h2>{{ $tag->name}}</h2>
            <span class="text-muted"> Lorem ipsum dolor, sit amet consectetur adipisicing elit. At cupiditate quidem eveniet animi asperiores repudiandae?</span>
        </div>
    </div>
    <div class="row">
        @foreach($products as $product)
        <div class="col-lg-4 col-md-6 col-sm-10">
            <div class="text-center" style="height:250px;">
                <img src="{{ asset($products->image)}}" class="h-100">
            </div>
            <div class="text-center">
                <span class="d-block fw-bold">{{product->name}}</span>
                <span class="d-block"> R$ {{product->price}}</span>
                <div class="mt-2">
                    <a href="{{ route('product.show', $product->id) }}" class="btn btn-secundary">Visualizar</a>
                    <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary">Comprar</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $product->links()}}
    </div>
</section>

@endsection
