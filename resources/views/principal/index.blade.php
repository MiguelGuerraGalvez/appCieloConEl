@extends('layouts.plantillaAppCieloConEL')

@section('title', 'Principal')

@section('image1')
    <section class="bg-cover w-full h-[25vh] md:h-[50vh] lg:h-[75vh] bg-no-repeat bg-[position:0_25%]" style="background-image: url(img/HEADER_PRINCIPAL.jpg);"> <!-- La imagen estaría en el fondo de pantalla -->
    </section>
@endsection

@section('content')
    <h1>Bienvenido a la página principal de App Cielo Con Él</h1>

    <h1>Buscador</h1>

    <input type="search" name="busqueda" id="busqueda">

    <div class="mt-24">
        @foreach ($consejos as $consejo)
            <a href="{{ route('consejo') }}">
                <article class="text-center flex flex-col items-center justify-center">
                    <figure class="flex items-center justify-center w-40 h-40 lg:w-60 lg:h-60">
                        <img class="w-full h-[10rem] lg:h-[15rem] object-contain" src="img/{{$consejo->escudo}}" alt="Escudo Consejo">
                    </figure>

                    <p>{{$consejo->nombre}}</p>
                </article>
            </a>
        @endforeach
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-24 mt-24">
        @foreach ($hermandades as $hermandad)
            <a href="{{ route('hermandad', $hermandad->nombre) }}">
                <article class="text-center flex flex-col items-center justify-center">
                    <figure class="flex items-center justify-center w-40 h-40 lg:w-60 lg:h-60">
                        <img class="w-full h-[10rem] lg:h-[15rem] object-contain" src="img/{{$hermandad->escudo}}" alt="Escudo Hermandad {{$hermandad->nombre}}">
                    </figure>

                    <p>{{$hermandad->nombre}}</p>
                </article>
            </a>
        @endforeach
    </div>

@endsection
