<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Editar Tag</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    @include('layouts.menu')
    <main class="container mt-5 bg-light">
        <h1>Editar tag</h1>
        <form method="POST" action="{{ route('tag.update', $tag->id) }}">
            @csrf
            @method('PATCH')
            <div class="row">
                <span class="form-label">Nome</span>
                <input type="text" name="name" class="form-control" value="{{ $tag->name }}">
            </div>

            <div class="row mt-4">
                <button type="submit" class="btn btn-success btn-lg">Salvar</button>
            </div>
        </form>
    </main>
</body>

</html>
