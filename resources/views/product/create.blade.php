<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Cadastra produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    @include('layouts.menu')
    <main class="container mt-5 bg-light">
        <h1>Cadastra produtos</h1>
        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <span class="form-label">Nome</span>
                <input type="text" name="name" class="form-control">
            </div>

            <div>
                <span class="form-label">Tipo</span>
                <div>
                    <input class="form-check-input" type="radio" name="type" value="Fruta">
                    <label class="form-check-label" for="type">
                        Fruta
                    </label>

                    <input class="form-check-input" type="radio" name="type" value="Verdura">
                    <label class="form-check-label" for="type">
                        Verdura
                    </label>

                    <input class="form-check-input" type="radio" name="type" value="Legume">
                    <label class="form-check-label" for="type">
                        Legume
                    </label>

                    <input class="form-check-input" type="radio" name="type" value="Vegetal">
                    <label class="form-check-label" for="type">
                        Vegetal
                    </label>

                    <input class="form-check-input" type="radio" name="type" value="Hortaliça">
                    <label class="form-check-label" for="type">
                        Hortaliça
                    </label>

                    <input class="form-check-input" type="radio" name="type" value="Outros">
                    <label class="form-check-label" for="type">
                        Outros
                    </label>
                </div>
            </div>
            <div class="row">
                <span class="form-label">Quantidade</span>
                <input type="number" min="0" max="1000000" name="qtds" class="form-control">
            </div>
            <div class="row">
                <span class="form-label">Unidade de Medida</span>
                <div>
                    <input class="form-check-input" type="radio" name="unidadeMedida" value="Kl">
                    <label class="form-check-label" for="unidadeMedida">
                        Kilo
                    </label>

                    <input class="form-check-input" type="radio" name="unidadeMedida" value="Gr">
                    <label class="form-check-label" for="unidadeMedida">
                        Gramas
                    </label>

                    <input class="form-check-input" type="radio" name="unidadeMedida" value="Un">
                    <label class="form-check-label" for="unidadeMedida">
                        Unidade
                    </label>
                </div>
            </div>
            <div class="row">
                <span class="form-label">Preço</span>
                <input type="number" min="0.00" max="10000.00" name="price" step="0.01" class="form-control">
            </div>
            <div class="row">
                <span class="form-label">Descrição</span>
                <textarea class="form-control" name="description"></textarea>
            </div>

            <div class="row">
                <span class="form-label">Promoção</span>
                <div>
                    <input class="form-check-input" type="radio" name="spotlight" value="sim">
                    <label class="form-check-label" for="spotlight">
                        Sim
                    </label>

                    <input class="form-check-input" type="radio" name="spotlight" value="não">
                    <label class="form-check-label" for="spotlight">
                        Não
                    </label>
                </div>
            </div>

            <div class="row">
                <span class="form-label">Tags</span>
                <select class="form-select" name="tags[]" multiple>
                    @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
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