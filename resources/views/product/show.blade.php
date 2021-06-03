@extends('layouts.store')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/') }}">Freskin</a></li>
        <li class="breadcrumb-item"><a href="{{url('/', $product->type)}}">{{ $product->type}}</a></li>
        <li class=" breadcrumb-item active" aria-current="page">{{$product->name}}</li>
    </ol>
</nav>
<div class="row">
    <div class="col-5 text-center">
        <img src="{{ asset($product->image) }}" style="width: 20rem; height: 15rem;">
        <p class="text-center text-secondary" style="font-size: 0.8rem;">Imagem meramente ilustrativa</p>
    </div>
    <div class="col-2">

    </div>

    <div class="col-5 text-center mt-3 "style="max-width: 18rem;">
        <div>
            <h2 class="pb-4">{{ $product->name}}</h2>
            <p class="" >{{ $product->description }}</p>
        </div>
        <div>
            <span class="h4 my-3">R$ {{$product->price }}</span>
            <span>({{$product->unidadeMedida }})</span>
        </div>
        <a href="{{ route('cart.add', $product->id) }}" class="btn btn-success my-1 mt-4">Adicionar ao carrinho</a>
        <!--<div class="d-block">
                    @foreach($product->tags as $tag)
                        <a href="#" class="btn btn-sm btn-warning mt-2">{{$tag->name}}</a>
                    @endforeach
                </div> -->
    </div>
    @endsection