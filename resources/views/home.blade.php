@extends('layouts.store')
@section('css')

@endsection


@section('content')

<section id="banner" class="d-flex align-items-center p-4">

    <div>
        <span class="h2 d-block text-capitalize homeFonte">Sábado é dia de feira no Freskin</span>
        <span class="h1 d-block text-uppercase fw-bold mb-3 homeFonte">Tudo Fresquinho para você, aproveite!</span>
        <a class="btn btn-md botaoHome" href="{{ route('products') }}">Veja nossos produtos</a>

    </div>

</section>
<section>
    <div class="row">
        <div class="text-center my-2">
            <h2>Produtos Direto da Horta</h2>
            <span class="text-muted">Nossos produtos são escolhidos com todo carinho e nossos fornecedores são escolhidos de forma criteriosa para melhor atende-lo </span>
        </div>
    </div>
    <div class="text-center my-2">
    <h4>Destaques da Semana</h4>
    </div>

    @foreach(\App\Models\Product::destaques() as $product)

    <div class="col-lg-3 col-md-6 col-sm-10 d-inline-block">
        <div class="text-center cardimg mt-3" style="height: 125px">
            <img src="{{asset($product->image) }}" class="w-75" style="height: 9rem;">
        </div>
        <div class="text-center">
            <span class="d-block fw-bold mt-4">{{ $product->name }}</span>
            <span class="d-block">R$ {{$product->price}}</span>
            <div class="mt-2">
                <a href="{{route('product.show', $product->id) }}" class="btn btn-secondary">Visualizar</a>
                <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary">Comprar</a>

            </div>

        </div>

    </div>
    @endforeach
    <div class="d-flex justify-content-center mt-4 ">{{\App\Models\Product::destaques()->links()}}</div>


</section>

@endsection
