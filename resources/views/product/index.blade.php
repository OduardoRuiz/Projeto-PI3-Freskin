<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Lista de produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script>
        function remover() {
            return confirm('Voce deseja remover a tag?');
        }
    </script>
</head>

<body>
    @include('layouts.menu')
    <main class="container mt-5">


        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
        @endif
        <h1>Lista de produtos</h1>
        <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary">Criar Produto</a>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagem</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Descrição</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $prod)
                    <tr>
                        <td>{{ $prod->id }}</td>
                        <td><img src="{{ asset($prod->image) }}" style="width:45px"></td>
                        <td>{{ $prod->name }}</td>
                        <td>{{ $prod->type }}</td>
                        <td>{{number_format($prod->qtds, 0, )  }}</td>
                        <td>{{ $prod->price }}</td>
                        <td style="max-width: 17rem;">{{ $prod->description }}</td>

                        <td>
                            <a href="{{ route('product.show', $prod->id) }}" class="btn btn-sm btn-success">Visualizar</a>
                            <a href="{{ route('product.edit', $prod->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form method="POST" action="{{route('product.destroy', $prod->id)}}" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger" onsubmit="return remover()">Apagar</button>
                            </form>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </main>
</body>

</html>
