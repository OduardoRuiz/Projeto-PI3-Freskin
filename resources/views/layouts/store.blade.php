<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <title>Freskin</title>
        <link rel="shortcut icon" href="imagens/logo.png" alt="Logo do Hortifruti Freskin de uma banana sorridente" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/8455a3d02b.js" crossorigin="anonymous"></script>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        @yield('css')
    </head>

    <body>
        <header>


            <nav class="navbar navbar-expand-md navbar-light ">

                    <a class="navbar-brand" href="{{ url('/') }}"><img id="logo" src="{{ asset('imagens/logo1.png') }}" /></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Alterna navegação">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('/') }}">Início<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('products') }}">Produtos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('sobre') }}">Conheça a Freskin</a>
                            </li>
                        </ul>
                        <form class="form-inline d-flex " method="get" action="{{ route('search') }}">
                            <input class="form-control mr-sm-2 " size="70" type="text" name="search" placeholder="Pesquisar" aria-label="Search">
                            <button class="btn btn-outline-success botaoPesquisar " type="submit">Pesquisar</button>
                        </form>
                        <!--Agora login e registrar aparecem na tela home, e nome de usuario aparece quando esta logado até linha 63-->

                        <div class="navbar-nav">
                            @if(Auth()->user())

                            <a class="nav-link" href="{{ route('user.profile', Auth()->user()->id) }}"><img class="imgCadastro" src="https://img-premium.flaticon.com/png/512/747/747376.png?token=exp=1622002187~hmac=ef5b7907685d374f4989287e6d002737">Bem vindo {{Auth()->user()->name}}</a>


                            <a class="nav-link d-flex carrinho" href="{{ route('cart.show') }}"><i class="fas fa-shopping-cart fa-2x ml-4 text-dark"></i> ({{\App\Models\Cart::count() }})</a>
                            <div class=" space-y-1 sair">
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <div >
                                        <a class="urlMenu" href="route('logout')" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                        Sair

                                    </a>
                                    </div>

                                </form>
                                @if(Auth()->user()->isAdmin == 1)
                                <div>
                                    <a class="urlMenu" id="adm" href="{{url('/product') }}">Painel de Controle</a>
                                </div>
                                @endif
                            </div>
                            @else

                            <a class="nav-link urlMenu " href="{{route('register') }}">Registrar</a>
                            <a class="nav-link urlMenu" href="{{route('login') }}">Logar</a>

                            @endif

                        </div>
                    </div>
            </nav>

        </header>
        <main class="container my-4">


            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">{{ session()->get ('success')}}</div>
            @endif
            @if(session()->has('error'))
            <div class="alert alert-danger" role="alert">{{session()->get('error')}}</div>
            @endif
            @yield('content')

        </main>
        <footer class="p-5 text-dark mt-2">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-md-3 ">
                        <h4 class="mb-3">Hortifruti Freskin</h4>
                        <p class= "merchan">Só aqui no Freskin você encontra os melhores produtos orgânicos e frescos para você que é freskin assim como nós.  </p>
                        <img class="vegan" src="https://images.vexels.com/media/users/3/137056/isolated/preview/1229f311106f8e5fe7bf368c8a42ca4f-emblema-de-r-oacute-tulo-ecol-oacute-gico-vegano-by-vexels.png">
                    </div>
                    <div class="col-md-3">
                        <h2 class="h4 ">Localização:</h2>
                        <address>Avenida Freskin <br>
                            Campos do Freskinho - São Paulo, SP<br>
                            CEP: 0000-000<br>
                            Telefone: (11) 0000-0000 <br>
                            <a class="text-dark" href="https://wa.me/message/R5XERYN6P4GOK1" target="_blank ">Whatsapp: (11) 96832-6278</a>
                        </address>
                    </div>
                    <div class="col-md-3">
                        <h2 class="h4">Horario de Funcionamento</h2>
                        <ul class="list-unstyled ">
                            <li>Segunda - Sábado: 6:00 - 23:00</li>
                            <li>Domingo - 8:00 - 16:00</li>
                        </ul>
                        <span class="h6">Nos siga em nossas redes sociais</span>
                        <div>
                            <a href="#" target="_blank "><i class="fab fa-instagram fa-2x ml-4 text-dark"></i><a>
                            <a href="#" target="_blank "><i class="fab fa-facebook-square fa-2x ml-4 text-dark"></i><a>
                        </div>
                    </div>
                    <div class="col-sm-3 ">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.91935587031!2d-46.64334988554385!3d-23.535402766518075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce585cb147798d%3A0xb30add9c31bc8e22!2sAv.%20Duque%20de%20Caxias%2C%20925%20-%20Campos%20El%C3%ADseos%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2001214-100!5e0!3m2!1spt-BR!2sbr!4v1619666579771!5m2!1spt-BR!2sbr" width="250" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </footer>
    </body>

</html>
