<x-guest-layout bodyClass="bg-[position:0_17%]" bodyStyle="background-image: url('/img/FONDO_REGISTRO.jpg');">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Usuario')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Correo Electrónico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="tel_number" :value="__('Teléfono')" />
            <x-text-input id="tel_number" class="block mt-1 w-full" type="tel" pattern="[0-9]{3}\s+[0-9]{2}\s+[0-9]{2}\s+[0-9]{2}" name="tel_number" :value="old('tel_number')" required autofocus autocomplete="tel_number" />
            <x-input-error :messages="$errors->get('tel_number')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        {{-- Crear perfil de Hermandad --}}
        <div class="mt-4 flex gap-2">
            <x-text-input id="perfil_hermandad" type="checkbox" name="perfil_hermandad"/>
            <x-input-label for="perfil_hermandad" :value="__('Perfil de Hermandad')" />
            <x-input-error :messages="$errors->get('perfil_hermandad')" class="mt-2" />
        </div>

        {{-- Nombre completo de Hermandad --}}
        <div class="mt-4">
            <x-input-label for="nombre_completo" :value="__('Nombre completo de la Hermandad')" />
            <x-text-input id="nombre_completo" class="block mt-1 w-full" type="text" name="nombre_completo"/>
            <x-input-error :messages="$errors->get('nombre_completo')" class="mt-2" />
        </div>

        {{-- Titulares --}}

        <div class="flex items-center justify-between text-center mt-4">
            <x-primary-button>
                {{ __('Register') }}
            </x-primary-button>
            
            <a class="underline font-bold text-sm text-gray-900 dark:text-gray-400 hover:text-black dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Inicio Sesión Aquí') }}
            </a>
        </div>
    </form>
</x-guest-layout>
