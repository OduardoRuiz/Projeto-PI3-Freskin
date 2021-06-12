<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img class="logoLogin" style="width: 20rem;" src="{{ asset('imagens/logo1.png') }}" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Esqueceu sua senha? Sem Problemas. Apenas insira seu email e receba um link para inserir uma nova senha.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Enviar nova senha por Email') }}
                </x-button>
            </div>
            <!--<img src="https://media1.tenor.com/images/409f276236738f4ef5f571f207f7ea49/tenor.gif?itemid=15443162">-->
        </form>
    </x-auth-card>
</x-guest-layout>
