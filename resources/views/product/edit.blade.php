<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Editar produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body class="container mt-5 bg-light">
    <h1>Editar produtos</h1>
    <form method="POST" action="{{ route('product.update', $product->id) }}">
        @csrf
        <div class="row">
            <span class="form-label">Nome</span>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}">
        </div>
        <div class="row">
            <span class="form-label">Descrição</span>
            <textarea class="form-control" name="description">{{ $product->description }}</textarea>
        </div>
        <div class="row">
            <span class="form-label">Preço</span>
            <input type="number" min="0.00" max="10000.00" name="price" step="0.01" class="form-control" value="{{ $product->price }}">
        </div>
        <div class="row mt-4">
            <button type="submit" class="btn btn-success btn-lg">Salvar</button>
        </div>
    </form>
</body>
</html>