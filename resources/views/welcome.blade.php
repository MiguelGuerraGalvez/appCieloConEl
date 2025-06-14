@vite('resources/css/app.css')

@extends('layouts.plantillaAppCieloConEl')

@section('title', 'Inicio')

@section('session')
    <a href="{{ route('login') }}" class="text-white underline text-lg">Iniciar Sesión</a>
@endsection

@section('image1')
    <section class="bg-cover bg-center w-full h-[25vh] md:h-[50vh] lg:h-[75vh] bg-no-repeat" style="background-image: url(img/HEADER_INICIO.jpg);"> <!-- La imagen estaría en el fondo de pantalla -->
        <div class="flex items-center justify-center text-center h-full text-white text-2xl md:text-4xl">
            <h1 class="p-[2rem] md:p-[4rem] lg:p-[8rem]">BIENVENIDO A LA PÁGINA APP CIELO CON ÉL</h1>
        </div>
    </section>
@endsection

@section('content')
    <div>
        <h3 class="text-[FFC060] text-3xl mb-4 text-center">INTRODUCCIÓN</h3>
        
        <div class="flex flex-col gap-2">
            <p>Bienvenido a App Cielo Con Él, una aplicación que te permitirá visualizar todo lo relacionado con las hermandades de la Semana Santa de tu localidad. Podrás mirar todas las hermandades que tenemos disponibles, además de buscar hermandades especificas con nuestro buscador integrado. Dentro de las hermandades podrás ver sus itinerarios y fotos de sus titulares.</p>
            <p>También podrás ver todos los carteles, pregones e itinerarios de todos los años disponibles en el consejo.</p>
            <p>Además, si eres una hermandad o el consejo, te permitirá administrar fácilmente varios aspectos de la corporación, como crear, modificar y eliminar itinerarios, carteles y pregones, contratar bandas, cambiar las imágenes de las cabeceras, entre otros.</p>
        </div>
    </div>
@endsection

@section('image2')
    <section class="w-full h-[25vh] md:h-[50vh] lg:h-[75vh] bg-yellow-400 bg-no-repeat bg-cover bg-center"  style="background-image: url(img/HEADER_ENLACE_HERMANDADES.jpg);"> <!-- La imagen estaría en el fondo de pantalla -->
        <div class="flex flex-col items-center justify-center gap-8 text-center h-full text-[#FFC060] text-2xl md:text-4xl p-[2rem] md:p-[4rem] lg:p-[8rem]">
            <h1>ÉCHALE UN VISTAZO A NUESTRAS HERMANDADES</h1>
            <a href="{{ route('principal') }}" class="bg-[#FFC060] text-black hover:bg-[#F9D193] py-2 px-4 rounded">ACCEDER</a>
        </div>
    </section>
@endsection