@extends('layouts.store')
@section('content')
<section id="cadastro">

    <form enctype="multipart/form-data" action="{{route('user.add')}}" method="post">
        @csrf

        <fieldset>
            <div>
                <img src="https://media.istockphoto.com/vectors/fruit-in-a-row-juicy-fruit-fruit-icons-in-modern-flat-design-isolated-vector-id1178032462?k=6&m=1178032462&s=170667a&w=0&h=aWKqKKiAerZMr8ZF4AdikSVm-LQN2rOkz4LBe637Qz0=" alt="frutas em uma fileira" class="frutas">
            </div>


            <h3>Endereço</h3>

            <div>
                <input type="text" value="{{Auth()->user()->id}}" name="user_id" style="display: none;">

                @if($address != null)

                @foreach($address as $endereco)
                <label class="mb-3 mt-2">
                    Cep:
                </label>

                <input type="text" name="cep" id="cep" onblur="cadastro.cep.pesquisacep(this.value);" value="{{$endereco->cep}}" maxlength="9" onkeypress="soNumero(this.id)" required="required" class="form-control">
                <span class="botaoCadastro" style="padding: 0.3rem;" >
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                    </svg>
                </span>
            </div>

            <div>
                <label class="mb-3 mt-2">
                    Rua:
                </label>
                <input type="text" name="address" id="rua" style="width: 20em" value="{{$endereco->address}}" class="form-control">

                <label class="mb-3 mt-2">
                    Nº:
                </label>
                <input type="text" name="address_number" id="numero" style="width: 5em" required="required" value="{{$endereco->address_number}}" class="form-control">
            </div>
            <div>
                <label class="mb-3 mt-2">
                    Complemento:
                </label>
                <input type="text" name="complement" id="complemento" value="{{$endereco->complement}}" class="form-control">
            </div>

            <div>
                <label class="mb-3 mt-2">
                    Bairro:
                </label>
                <input type="text" name="neighborhood" id="bairro" value="{{$endereco->neighborhood}}" class="form-control">

                <label class="mb-3 mt-2">
                    Estado:
                </label class="mb-3 mt-2">
                <input type="text" name="address_state" id="estado" style="width: 3em" value="{{$endereco->address_state}}" class="form-control">

                <label class="mb-3 mt-2">
                    Cidade:
                </label>
                <input type="text" name="address_city" id="cidade" value="{{$endereco->address_city}}" class="form-control">
            </div>

        </fieldset>

        <fieldset>
            <h3>Contato</h3>

            <div>
                <label class="mb-3 mt-2">
                    Telefone
                </label>
                <input type="text" name="contact" onkeypress="soNumero(this.id)" value="{{$endereco->contact}}" class="form-control" id="telefone" pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})" required="required" maxlength="15">

            </div>
            @endforeach
            @endif
            @php
            $a = \App\Models\Address::where('user_id', '=', Auth()->user()->id)->first();
            @endphp
            @if($a == null)
            <label class="mb-3 mt-2">
                Cep:
            </label>

            <input type="text" name="cep" id="cep" onblur="cadastro.cep.pesquisacep(this.value);" value="" maxlength="9" onkeypress="soNumero(this.id)" required="required" class="form-control">
            <span>
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                </svg>
            </span>
            </div>

            <div>
                <label class="mb-3 mt-2">
                    Rua:
                </label>
                <input type="text" name="address" id="rua" value="" class="form-control">

                <label class="mb-3 mt-2">
                    Nº:
                </label>
                <input type="text" name="address_number" id="numero" required="required" value="" class="form-control">

                <label class="mb-3 mt-2">
                    Complemento:
                </label>
                <input type="text" name="complement" id="complemento" value="" class="form-control">
            </div>

            <div>
                <label class="mb-3 mt-2">
                    Bairro:
                </label>
                <input type="text" name="neighborhood" id="bairro" value="" class="form-control">

                <label class="mb-3 mt-2">
                    Estado:
                </label>
                <input type="text" name="address_state" id="estado" value="" class="form-control">

                <label class="mb-3 mt-2">
                    Cidade:
                </label>
                <input type="text" name="address_city" id="cidade" value="" placeholder="" class="form-control">
            </div>

        </fieldset>

        <fieldset>
            <h3>Contato</h3>

            <div>
                <label class="mb-3">
                    Telefone
                </label>
                <input type="tel" id="telefone" onkeypress="soNumero(this.id)" name="contact" attern="(\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})" maxlength="15" class="form-control" title="Digite seu telefone com DDD" required>





        </fieldset>

        @endif


        <div>
            <button type="submit" class="mt-3 botaoCadastro">Cadastrar</button>
        </div>

        </fieldset>


    </form>

</section>

@endsection