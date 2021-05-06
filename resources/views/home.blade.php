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

<section id="banner" class="d-flex align-items-center p-4">

    <div>
        <span class="h2 d-block text-capitalize">Sábado é dia de feira no Freskin</span>
        <span class="h1 d-block text-uppercase fw-bold mb-3">Tudo Fresquinho para você, aproveite!</span>
        <button class="btn btn-md btn-primary">Veja nossos produtos</button>

    </div>

</section>
<section>
    <div class="row">
        <div class="text-center my-2">
            <h2>Produtos Direto da Horta</h2>
            <span class="text-muted">Nossos produtos são escolhidos com todo carinho e nossos fornecedores são escolhidos de forma criteriosa para melhor atende-lo atende-lo</span>

        </div>
    </div>
    @foreach(\App\Models\Product::destaques() as $product)

    <div class="col-lg-4 col-md-6 col-sm-10">
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
