<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('img/LOGO.png') }}">
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css') }}">
    @vite('resources/css/app.css')
</head>
<body class="bg-[#EBEBEB]">
    <header class="bg-[#8C52FF] flex items-center justify-between w-full py-[2rem] lg:py-[2rem] px-[2rem] md:px-[4rem] lg:px-[8rem]">
        <a href="{{ route('principal') }}">
            <figure class="flex flex-col items-center w-[10rem]">
                <img class="max-w-full h-auto" src="@yield('logo')img/LOGO.png" alt="Logo">
            </figure>
        </a>
        @if (Route::currentRouteName() !== 'welcome')
        <figure class="w-[8rem] h-[8rem] rounded-full overflow-hidden">
            <button id="openModal" class="focus:outline-none">
                <img class="w-full h-full object-cover" src="@yield('logo')img/{{ Auth::user()->icon }}" alt="Usuario">
            </button>
        </figure>
            <div id="plantillaModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
                <div class="bg-[#8C52FF] flex flex-col items-center text-center text-white p-8 rounded-lg max-w-lg w-[90%] relative">
                    <button id="closeModal" class="absolute top-2 right-2 text-white hover:text-gray-300 text-xl">&times;</button>
                    
                    <figure class="w-[10rem] h-[10rem] lg:w-[15rem] lg:h-[15rem] rounded-full overflow-hidden">
                        <a href="{{ route('principal.modificarUsuario') }}"><img class="w-full h-full object-cover" src="@yield('logo')img/{{ Auth::user()->icon }}" alt="Usuario"></a>
                    </figure>

                    <h2 class="text-2xl font-bold mb-4 text-center">{{ Auth::user()->name }}</h2>

                    @if (Auth::user()->rol == 'hermandad')
                        <a class="underline hover:text-gray-600" href="{{ route('hermandad.administracion', ['hermandad' => Auth::user()->name]) }}">Panel de administración</a>
                    @else
                        @if (Auth::user()->rol == 'consejo')
                            <a class="underline hover:text-gray-600" href="{{ route('consejo.administracion') }}">Panel de administración</a>
                        @endif
                    @endif

                    <div class="flex justify-center mt-6">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="text-white hover:text-gray-300 underline text-lg">
                                {{ __('Cerrar Sesión') }}
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        @endif
        @yield('session')
    </header>

    @yield('image1')
    
    <section class="flex flex-col items-center justify-between w-full py-[2rem] p-[2rem] md:p-[4rem] lg:p-[8rem] text-lg">
        @yield('content')
    </section>
    
    @yield('image2')
    
    @yield('image3')
    
    @yield('image4')
    
    <footer class="bg-[#8C52FF] flex flex-col items-center justify-center py-8">
        <section class="w-full flex flex-col items-center">         
            {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25428.37596911147!2d-5.8004329227507165!3d37.187235256439834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd127f0ec1c94487%3A0x6a1c6276d4cb02c0!2s41710%20Utrera%2C%20Sevilla!5e0!3m2!1ses!2ses!4v1749977527844!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
            <p class="text-white text-center mt-4 text-sm md:text-base">
                &copy; Todos los derechos reservados
            </p>
        </section>
    </footer>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js" integrity="sha256-9zljDKpE/mQxmaR4V2cGVaQ7arF3CcXxarvgr7Sj8Uc=" crossorigin="anonymous"></script>
    
    <script>
        const openModal = document.getElementById('openModal');
        const closeModal = document.getElementById('closeModal');
        const modal = document.getElementById('plantillaModal');

        if (openModal && closeModal && modal) {
            openModal.addEventListener('click', () => {
                modal.classList.remove('hidden');
            });

            closeModal.addEventListener('click', () => {
                modal.classList.add('hidden');
            });

            window.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        }
    </script>
</body>
</html>