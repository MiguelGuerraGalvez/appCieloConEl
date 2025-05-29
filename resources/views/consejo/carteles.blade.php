@extends('layouts.plantillaAppCieloConEL')

@section('title', 'Carteles')

@section('logo', '../')

@section('image1')
    <section class="bg-no-repeat bg-cover bg-[position:0_70%] w-full h-[25vh] md:h-[50vh] lg:h-[75vh]" style="background-image: url(../img/HEADER_CARTELES.jpg);"> <!-- La imagen estaría en el fondo de pantalla -->
    </section>
@endsection

@section('content')

    <h3 class="text-[FFC060] text-3xl md:text-5xl lg:text-7xl text-center md:mb-8 lg:mb-24">CARTELES</h3>

    <article class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-8 gap-y-24 mt-8 w-[80vw] text-center">
        @foreach ($carteles as $cartel)
            <a href="../img/{{$cartel->imagen}}">
                <div class="bg-no-repeat bg-cover bg-center h-[20rem] lg:h-[30rem]" style="background-image: url(../img/{{$cartel->imagen}});"></div>
                <p class="mt-8">Año: {{$cartel->anio}}</p>
                <p>Autor: {{$cartel->autor}}</p>
            </a>
        @endforeach
    </article>
    
    <a class="mt-8 lg:mt-24 text-3xl underline" href="{{ route('consejo') }}">VOLVER ATRÁS</a>

@endsection