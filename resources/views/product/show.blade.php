@extends('layouts.store')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/') }}">Freskin</a></li>
        <li class="breadcrumb-item"><a href="{{url('/', $product->type)}}">{{ $product->type}}</a></li>
        <li class=" breadcrumb-item active" aria-current="page">{{$product->name}}</li>
</nav>
<div class="row">
    <div class="col-6 texte-center">
        <img src="{{ asset($product->image) }}" style="width:250px;">
    </div>
    <div class="col-6 text-center">
        <h2>{{ $product->name}}</h2>
        <p class="my-3">{{ $product->description }}</p>
        <span class="h4 d-block my-3">R$ {{$product->price }}</span>
        <button class="btn btn-success my-1">Adicionar ao carrinho</button>
        <!--<div class="d-block">
                    @foreach($product->tags as $tag)
                        <a href="#" class="btn btn-sm btn-warning mt-2">{{$tag->name}}</a>
                    @endforeach
                </div> -->
    </div>
    @endsection
