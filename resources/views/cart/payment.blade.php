@extends('layouts.store')
@section('content')
<h2>Pagamento</h2>
<div class="row justify-content-center">
    <div class="col-md-6 col-10 my-4 p-3">
        <h3>Endereço de entrega</h3>
        @foreach(\App\Models\Address::where('user_id','=', Auth()->user()->id)->get() as $endereco)
        <address class="ms-3">
            <!--Implementar aqui para puxar o endereço de usuario cadastrado-->

            <p>Endereço: {{$endereco->address}}, {{$endereco->address_number}}, {{$endereco->neighborhood}} </p>
            <p> Cidade: {{$endereco->address_city}}, {{$endereco->address_state}}</p>
            <p>Cep: {{$endereco->cep}}</p>

        </address>
        @endforeach
        <a href="{{ route('user.profile', Auth()->user()->id) }}" class="float-end me-4">Trocar o endereço</a>
    </div>

    <div class="col-md-6 col-10 bg-light my-4">
        <h3>Resumo da Compra</h3>
        <div class="ms-3">

            <div>
                <span>Quantidade de produtos comprados:</span>
                <a href="{{ route('cart.show') }}" class="float-end me-4">{{ \App\Models\Cart::count() }} produto(s)</a>
            </div>

        </div>
        <div>
            <!--se sobrar tempo implementar função do frete,
                sugiro fazer frete gratis e uma função para validar,
                se esta dentro da area de entrega, ou o que for mais facil-->
            <span>Frete:</span>
            <span class="float-end me-4 text-success fw-bold">GRÁTIS</span>

        </div>

        <hr>
        <div>
            <span class="h4">Total a pagar:</span>
            <span class="float-end me-4 h4">R$ {{ number_format(\app\Models\Cart::totalValue(), 2, ',' , '.') }}</span>
        </div>
    </div>
</div>
<hr>
<form style="margin-top: 25px; margin-bottom: 70px;" method="POST" action="{{route('order.add')}}">
    <h3>Dados de pagamento</h3>
    @csrf
    <div class="row justify-content-center">
        <div class="col-md-5 col-10 mb-3">
            <label for="cc-nome">Nome no cartão</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                <input type="text" id="cc-nome" name="cc-nome" class="form-control" required>
            </div>
            <small class="text-muted">Você deve preencher o nome igual está no cartão</small>
        </div>
        <div class="col-md-5 col-10 mb-3">
            <label for="cc_card">Número do cartão</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                <input type="text" id="cc_card"  onkeypress="soNumero(this.id)" name="cc_card" class="form-control" required maxlength="19">
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-5 col-10 mb-3">
            <label for="cc-nome">Código CVV (Atras do cartão)</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-unlock"></i></span>
                <input type="text" id="cc-cvv" onkeypress="soNumero(this.id)" name="cc-cvv" class="form-control" required maxlength="3">
            </div>
        </div>
        <div class="col-md-5 col-10 mb-3">
            <label for="cc-nome">Data de expiração</label>
            <div class="input-group">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                <input type="text" id="cc-date" onkeypress="soNumero(this.id)" name="cc-date" class="form-control" required required maxlength="7">
            </div>
        </div>
    </div>
    @if(Auth()->user()->isAdmin == 0)
    <button type="submit" class="btn btn-lg btn-success float-end">Efetuar Pagamento</button>
    @endif
</form>

@endsection
