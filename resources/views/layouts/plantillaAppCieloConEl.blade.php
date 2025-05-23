@vite('resources/css/app.css')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body class="bg-[#EBEBEB]">
    <header class="bg-[#8C52FF] flex items-center justify-between w-full py-[2rem] lg:py-[2rem] px-[2rem] md:px-[4rem] lg:px-[8rem]">
        <a href="{{ route('principal') }}"> <!-- Llevaría a la página principal -->
            <figure class="flex flex-col items-center w-[10rem]">
                <img class="max-w-full h-auto" src="@yield('logo')img/LOGO.png" alt="Logo">
            </figure>
        </a>
        @yield('session')
    </header>

    @yield('image1')
    
    <section class="flex flex-col items-center justify-between w-full py-[2rem] p-[2rem] md:p-[4rem] lg:p-[8rem] text-lg">
        @yield('content')
    </section>
    
    @yield('image2')
    
    @yield('image3')
    
    @yield('image4')
    
    <footer class="bg-[#8C52FF] flex items-center justify-center">
        <section class="text-center p-[2rem] w-full max-w-4xl text-lg">
            <div class="flex items-center justify-between gap-4">
                <a href="" class="underline text-white">Política de privacidad</a>
            
                <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d25429.95099026055!2d-5.793657512088047!3d37.1825573742897!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sIglesia%20Cat%C3%B3lica%20Utrera!5e0!3m2!1ses!2ses!4v1746618945552!5m2!1ses!2ses" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-[200px] h-[100px] md:w-[400px] md:h-[200px]"></iframe>
    
                <a href="" class="underline text-white">Política de Cookies</a>
            </div>
            
            <div class="mt-4">
                <p class="text-white">&copy; Todos los derechos reservados</p>
            </div>
        </section>
    </footer>
</body>
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js" integrity="sha256-9zljDKpE/mQxmaR4V2cGVaQ7arF3CcXxarvgr7Sj8Uc=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</html>