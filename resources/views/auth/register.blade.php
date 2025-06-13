<title>Registrate</title>
<link rel="icon" type="image/png" href="{{ asset('img/LOGO.png') }}">

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
            <x-text-input id="tel_number" class="block mt-1 w-full" type="tel" name="tel_number" :value="old('tel_number')" required autofocus autocomplete="tel_number" />
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

        {{-- Campos condicionales: Hermandad y Titulares --}}
        <div id="hermandad-fields" style="display: none;">
            {{-- Nombre completo de Hermandad --}}
            <div class="mt-4">
                <x-input-label for="nombre_completo" :value="__('Nombre completo de la Hermandad')" />
                <x-text-input id="nombre_completo" class="block mt-1 w-full" type="text" name="nombre_completo" disabled/>
                <x-input-error :messages="$errors->get('nombre_completo')" class="mt-2" />
            </div>

            {{-- Titulares --}}
            <div id="titulares-wrapper" class="mt-6 space-y-4">
                <div class="titular-group">
                    <x-input-label :value="__('Nombre corto del Titular')" />
                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full titular-corto" type="text" name="titular_corto[]" disabled />

                    <x-input-label class="mt-2" :value="__('Nombre completo del Titular')" />
                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full titular-completo" type="text" name="titular_completo[]" disabled />
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between text-center mt-4">
            <x-primary-button>
                {{ __('Register') }}
            </x-primary-button>
            
            <a class="underline font-bold text-sm text-gray-900 dark:text-gray-400 hover:text-black dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Inicio Sesión Aquí') }}
            </a>
        </div>
    </form>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const wrapper = document.getElementById('titulares-wrapper');
        const hermandadFields = document.getElementById('hermandad-fields');
        const checkbox = document.getElementById('perfil_hermandad');
        const nombreCompletoInput = document.getElementById('nombre_completo');

        function toggleHermandadFields() {
            const enabled = checkbox.checked;
            hermandadFields.style.display = enabled ? 'block' : 'none';
            nombreCompletoInput.disabled = !enabled;

            const inputs = hermandadFields.querySelectorAll('input');
            inputs.forEach(input => {
                input.disabled = !enabled;
            });
        }

        checkbox.addEventListener('change', toggleHermandadFields);
        toggleHermandadFields(); // Ejecutar al cargar la página

        function createTitularGroup() {
            const group = document.createElement('div');
            group.classList.add('titular-group');

            const labelCorto = document.createElement('label');
            labelCorto.textContent = 'Nombre corto del Titular';
            labelCorto.classList.add('block', 'mt-2', 'font-medium', 'text-sm', 'text-gray-700', 'dark:text-gray-300');
            const inputCorto = document.createElement('input');
            inputCorto.type = 'text';
            inputCorto.name = 'titular_corto[]';
            inputCorto.classList.add('border-gray-300', 'dark:border-gray-700', 'dark:bg-gray-900', 'dark:text-gray-300', 'focus:border-indigo-500', 'dark:focus:border-indigo-600', 'focus:ring-indigo-500', 'dark:focus:ring-indigo-600', 'rounded-md', 'shadow-sm', 'block', 'mt-1', 'w-full', 'titular-corto');

            const labelCompleto = document.createElement('label');
            labelCompleto.textContent = 'Nombre completo del Titular';
            labelCompleto.classList.add('block', 'mt-2', 'font-medium', 'text-sm', 'text-gray-700', 'dark:text-gray-300');
            const inputCompleto = document.createElement('input');
            inputCompleto.type = 'text';
            inputCompleto.name = 'titular_completo[]';
            inputCompleto.classList.add('border-gray-300', 'dark:border-gray-700', 'dark:bg-gray-900', 'dark:text-gray-300', 'focus:border-indigo-500', 'dark:focus:border-indigo-600', 'focus:ring-indigo-500', 'dark:focus:ring-indigo-600', 'rounded-md', 'shadow-sm', 'block', 'mt-1', 'w-full', 'titular-completo');

            inputCorto.addEventListener('input', checkAndAdd);
            inputCompleto.addEventListener('input', checkAndAdd);

            group.appendChild(labelCorto);
            group.appendChild(inputCorto);
            group.appendChild(labelCompleto);
            group.appendChild(inputCompleto);

            return group;
        }

        function checkAndAdd() {
            const groups = wrapper.querySelectorAll('.titular-group');
            const lastGroup = groups[groups.length - 1];
            const corto = lastGroup.querySelector('.titular-corto').value.trim();
            const completo = lastGroup.querySelector('.titular-completo').value.trim();

            if ((corto !== '' || completo !== '') && groups.length === wrapper.querySelectorAll('.titular-group').length) {
                const newGroup = createTitularGroup();
                wrapper.appendChild(newGroup);

                // Solo habilitar si el checkbox está marcado
                if (checkbox.checked) {
                    const newInputs = newGroup.querySelectorAll('input');
                    newInputs.forEach(input => input.disabled = false);
                }
            }

            // Eliminar grupos vacíos menos el último
            groups.forEach((group, index) => {
                if (index < groups.length - 1) {
                    const cortoVal = group.querySelector('.titular-corto').value.trim();
                    const completoVal = group.querySelector('.titular-completo').value.trim();
                    if (cortoVal === '' && completoVal === '') {
                        group.remove();
                    }
                }
            });
        }

        // Añadir eventos iniciales al primer grupo
        const initialGroup = wrapper.querySelector('.titular-group');
        const inputCortoInit = initialGroup.querySelector('.titular-corto');
        const inputCompletoInit = initialGroup.querySelector('.titular-completo');

        inputCortoInit.addEventListener('input', checkAndAdd);
        inputCompletoInit.addEventListener('input', checkAndAdd);
    });
</script>
</x-guest-layout>
