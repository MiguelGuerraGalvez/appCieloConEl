<title>Confirmar Contraseña</title>
<link rel="icon" type="image/png" href="{{ asset('img/LOGO.png') }}">

<x-guest-layout bodyClass="bg-[position:0_17%]" bodyStyle="background-image: url('/img/FONDO_REGISTRO.jpg');">
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Por favor, confirma tu contraseña antes de continuar.') }}
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Confirmar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>