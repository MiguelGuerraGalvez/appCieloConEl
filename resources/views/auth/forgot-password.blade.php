<title>Recuperar Contraseña</title>
<link rel="icon" type="image/png" href="{{ asset('img/LOGO.png') }}">

<x-guest-layout bodyClass="bg-center" bodyStyle="background-image: url('/img/FONDO_INICIO_SESION.jpg');">
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('¿Olvidaste tu contraseña? No hay problema. Indica tu correo electrónico y te enviaremos un enlace para restablecerla.') }}
    </div>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Correo Electrónico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Enviar enlace de recuperación') }}
            </x-primary-button>
        </div>

        <div class="flex items-center justify-between text-center mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Volver al inicio de sesión') }}
            </a>

            <a class="underline font-bold text-sm text-gray-900 dark:text-gray-400 hover:text-black dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">
                {{ __('Regístrate Aquí') }}
            </a>
        </div>
    </form>
</x-guest-layout>