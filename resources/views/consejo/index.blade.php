@extends('layouts.plantillaAppCieloConEL')

@section('title', 'Consejo')

@section('image1')
    <section class="bg-cover bg-center w-full h-[25vh] md:h-[50vh] lg:h-[75vh] bg-no-repeat" style="background-image: url(img/HEADER_CONSEJO.jpg);"> <!-- La imagen estaría en el fondo de pantalla -->
    </section>
@endsection

@section('content')
    <div class="w-full flex flex-col lg:flex-row items-center justify-evenly text-center gap-4 lg:gap-0">
        <figure class="w-40 h-40 lg:w-60 lg:h-60">
            <img class="w-full h-[10rem] lg:h-[15rem] object-contain" src="img/{{$consejo->escudo}}" alt="Escudo Consejo">
        </figure>

        <h1 class="lg:text-3xl">{{$consejo->nombre_completo}}</h1>
    </div>
@endsection

@section('image2')
    <a href="{{ route('consejo.carteles') }}">
        <section class="w-full h-[25vh] md:h-[50vh] lg:h-[50vh] bg-yellow-400 bg-no-repeat bg-cover bg-center"  style="background-image: url(img/BOTON_CARTELES.jpg);"> <!-- La imagenestaría en el fondo de pantalla -->
            <div class="flex flex-col items-center justify-center gap-8 text-center h-full text-[#FFC060] text-2xl md:text-4xl p-[2rem] md:p-[4rem] lg:p-[8rem] backdrop-blur-sm">
                <p class="text-white py-2 px-4 underline">CARTELES</p>
            </div>
        </section>
    </a>
@endsection

@section('image3')
    <a href="{{ route('consejo.pregones') }}">
        <section class="w-full h-[25vh] md:h-[50vh] lg:h-[50vh] bg-yellow-400 bg-no-repeat bg-cover bg-center"  style="background-image: url(img/BOTON_PREGONES.jpg);"> <!-- La imagenestaría en el fondo de pantalla -->
            <div class="flex flex-col items-center justify-center gap-8 text-center h-full text-[#FFC060] text-2xl md:text-4xl p-[2rem] md:p-[4rem] lg:p-[8rem] backdrop-blur-sm">
                <p class="text-white py-2 px-4 underline">PREGONES</p>
            </div>
        </section>
    </a>
@endsection

@section('image4')
    <a href="{{ route('consejo.itinerarios') }}">
        <section class="w-full h-[25vh] md:h-[50vh] lg:h-[50vh] bg-yellow-400 bg-no-repeat bg-cover  bg-[position:0_20%]"  style="background-image: url(img/BOTON_ITINERARIOS.jpg);"> <!-- La imagenestaría en el fondo de pantalla -->
            <div class="flex flex-col items-center justify-center gap-8 text-center h-full text-[#FFC060] text-2xl md:text-4xl p-[2rem] md:p-[4rem] lg:p-[8rem] backdrop-blur-sm">
                <p href="{{ route('login') }}" class="text-white py-2 px-4 underline">ITINERARIOS</p>
            </div>
        </section>
    </a>
@endsection