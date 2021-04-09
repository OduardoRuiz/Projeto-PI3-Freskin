<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Editar produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    @include('layouts.menu')
    <main class="container mt-5 bg-light">
        <h1>Editar produtos</h1>
        <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <span class="form-label">Nome</span>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}">
            </div>
            <div class="row">
                <span class="form-label">Tipo</span>
                <select name="type" class="form-select" aria-label="Default select example">
                    <option selected>Selecione uma opção</option>
                    <option value="fruta">Fruta</option>
                    <option value="verdura">Verdura</option>
                    <option value="legume">Legume</option>
                </select>
            </div>
            <div class="row">
                <span class="form-label">Quantidade</span>
                <input type="number" min="0" max="1000000" name="qtds" value="{{ $product->qtds }}" class="form-control">
            </div>

            <div class="row">
                <span class="form-label">Preço</span>
                <input type="number" min="0.00" max="10000.00" name="price" step="0.01" class="form-control" value="{{ $product->price }}">
            </div>
            <div class="row">
                <span class="form-label">Descrição</span>
                <textarea class="form-control" name="description">{{ $product->description }}</textarea>
            </div>

            <div class="row">
                <span class="form-label">Tags</span>
                <select class="form-select" name="tags[]" multiple>
                    @foreach($tags as $tag)
                    <option value="{{$tag->id}}" @if($product->tags->contains($tag->id)) selected @endif>{{$tag->name}}</option>
                    @endforeach
                </select>

            </div>
            <div class="row">
                <span class="form-label">Imagem</span>
                <input type="file" class="form-control" name="image">
            </div>
            <div class="row mt-4">
                <button type="submit" class="btn btn-success btn-lg">Salvar</button>
            </div>
        </form>
    </main>
</body>

</html>
