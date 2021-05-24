<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Lista de Tags </title>
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
        <h1>Lista de Tags</h1>
        <a href="{{ route('tag.create') }}" class="btn btn-sm btn-primary">Criar Tag</a>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>

                        <td>
                        
                            <a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-sm btn-warning">Editar</a>

                            <form method="POST" action="{{route('tag.destroy', $tag->id)}}" class="d-inline">
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
