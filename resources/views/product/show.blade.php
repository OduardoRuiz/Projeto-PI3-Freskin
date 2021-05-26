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
    <div class="col-6 texte-center">
        <img src="{{ asset($product->image) }}" class="produtoVis">
    </div>
    <div class="col-6 text-center">
        <h2>{{ $product->name}}</h2>
        <p class="my-3">{{ $product->description }}</p>
        <div >
        <span class="h4 my-3">R$ {{$product->price }}</span>
        <span>({{$product->unidadeMedida }})</span>
        </div>
        <a href="{{ route('cart.add', $product->id) }}" class="btn btn-success my-1">Adicionar ao carrinho</a>
        <!--<div class="d-block">
                    @foreach($product->tags as $tag)
                        <a href="#" class="btn btn-sm btn-warning mt-2">{{$tag->name}}</a>
                    @endforeach
                </div> -->
    </div>
    @endsection
