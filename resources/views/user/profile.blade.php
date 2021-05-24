@extends('layouts.store')
@section('content')
<section id="cadastro">

    <form enctype="multipart/form-data" action="{{route('user.add')}}" method="post">
        @csrf

        <fieldset>

            <h3>Endereço</h3>


            <div>
                <input type="text" value="{{Auth()->user()->id}}" name="user_id" style="display: none;">

                @if($address != null)

                @foreach($address as $endereco)
                <label>
                    Cep:
                </label>

                <input type="text" name="cep" id="cep" onblur="cadastro.cep.pesquisacep(this.value);" value="{{$endereco->cep}}" maxlength="9" onkeypress="soNumero(this.id)" required="required">
                <span>
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                    </svg>
                </span>
            </div>

            <div>
                <label>
                    Rua:
                </label>
                <input type="text" name="address" id="rua" style="width: 20em" value="{{$endereco->address}}">

                <label>
                    Nº:
                </label>
                <input type="text" name="address_number" id="numero" style="width: 5em" required="required" value="{{$endereco->address_number}}">

                <label>
                    Complemento:
                </label>
                <input type="text" name="complement" id="complemento" value="{{$endereco->complement}}">
            </div>

            <div>
                <label>
                    Bairro:
                </label>
                <input type="text" name="neighborhood" id="bairro" value="{{$endereco->neighborhood}}">

                <label>
                    Estado:
                </label>
                <input type="text" name="address_state" id="estado" style="width: 3em" value="{{$endereco->address_state}}">

                <label>
                    Cidade:
                </label>
                <input type="text" name="address_city" id="cidade" value="{{$endereco->address_city}}">
            </div>

        </fieldset>

        <fieldset>
            <h3>Contato</h3>

            <div>
                <label>
                    Telefone
                </label>
                <input type="text" name="contact" value="{{$endereco->contact}}">

            </div>
            @endforeach
            @endif
            @php
            $a = \App\Models\Address::where('user_id', '=', Auth()->user()->id)->first();
            @endphp
            @if($a == null)
            <label>
                Cep:
            </label>

            <input type="text" name="cep" id="cep" onblur="cadastro.cep.pesquisacep(this.value);" value="" maxlength="9" onkeypress="soNumero(this.id)" required="required">
            <span>
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                </svg>
            </span>
            </div>

            <div>
                <label>
                    Rua:
                </label>
                <input type="text" name="address" id="rua" style="width: 20em" value="">

                <label>
                    Nº:
                </label>
                <input type="text" name="address_number" id="numero" style="width: 5em" required="required" value="">

                <label>
                    Complemento:
                </label>
                <input type="text" name="complement" id="complemento" value="">
            </div>

            <div>
                <label>
                    Bairro:
                </label>
                <input type="text" name="neighborhood" id="bairro" value="">

                <label>
                    Estado:
                </label>
                <input type="text" name="address_state" id="estado" style="width: 3em" value="">

                <label>
                    Cidade:
                </label>
                <input type="text" name="address_city" id="cidade" value="">
            </div>

        </fieldset>

        <fieldset>
            <h3>Contato</h3>

            <div>
                <label>
                    Telefone
                </label>
                <input type="text" name="contact" value="">





        </fieldset>

        @endif


        <div>
            <button type="submit">Cadastrar</button>
        </div>

        </fieldset>


    </form>

</section>

@endsection