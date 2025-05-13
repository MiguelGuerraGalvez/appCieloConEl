@vite('resources/css/app.css')

@extends('layouts.plantillaAppCieloConEL')

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
    <h3 class="text-[FFC060] text-2xl mb-4">INTRODUCCIÓN</h3>
    <p>Bienvenido a App Cielo Con Él, una aplicación que te permitirá poder visualizar todo lo relacionado a las hermandades de la Semana Santa de tu localidad. Además, si eres una hermandad o el consejo, te permitirá administrar fácilmente varios aspectos de la corporación.</p>
@endsection

@section('image2')
    <section class="w-full h-[25vh] md:h-[50vh] lg:h-[75vh] bg-yellow-400 bg-no-repeat bg-cover bg-center"  style="background-image: url(img/HEADER_ENLACE_HERMANDADES.jpg);"> <!-- La imagen estaría en el fondo de pantalla -->
        <div class="flex flex-col items-center justify-center gap-8 text-center h-full text-[#FFC060] text-2xl md:text-4xl p-[2rem] md:p-[4rem] lg:p-[8rem]">
            <h1>ÉCHALE UN VISTAZO A NUESTRAS HERMANDADES</h1>
            <a href="{{ route('login') }}" class="bg-[#FFC060] text-black hover:bg-[#F9D193] py-2 px-4 rounded">ACCEDER</a>
        </div>
    </section>
@endsection