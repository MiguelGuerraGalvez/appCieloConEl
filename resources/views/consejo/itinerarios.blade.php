@extends('layouts.plantillaAppCieloConEL')

@section('title', 'Itinerarios')

@section('logo', '../')

@section('image1')
    <section class="bg-no-repeat bg-cover bg-center w-full h-[25vh] md:h-[50vh] lg:h-[75vh]" style="background-image: url(../img/HEADER_ITINERARIOS.jpg);"> <!-- La imagen estaría en el fondo de pantalla -->
    </section>
@endsection

@section('content')

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-8 gap-y-24 mt-8 w-[80vw]">
        @foreach ($itinerarios as $itin)
            @foreach ($itin as $itinerario)
                <div class="bg-white p-2 md:p-4 lg:p-8 lg:w-[17rem] h-[20rem] lg:h-[30rem] overflow-hidden">
                    <article class="flex flex-col justify-between md:gap-1 lg:gap-2">
                        <h1 class="text-[7px] lg:text-xs text-center leading-[10px] md:leading-none">{{$itinerario->dia}}</h1>
                        <h2 class="text-[5px] lg:text-[7px] text-center leading-[10px] md:leading-none">Nombre Hermandad y Escudo</h2><img>
                        <div>
                            <h3 class="font-bold text-[5px] lg:text-[7px] leading-[10px] md:leading-none">PASOS</h3>
                            <p class="text-[5px] lg:text-[7px] leading-[10px] md:leading-none"></p>
                        </div>
                        <div>
                            <h3 class="font-bold text-[5px] lg:text-[7px] leading-[10px] md:leading-none">MÚSICA</h3>
                            <p class="text-[5px] lg:text-[7px] leading-[10px] md:leading-none"></p>
                        </div>
            
                        <div>
                            <h3 class="font-bold text-[5px] lg:text-[7px] leading-[10px] md:leading-none">¿NAZARENOS?</h3>
                            <p class="text-[5px] lg:text-[7px] leading-[10px] md:leading-none"></p>
                        </div>
            
                        <div>
                            <h3 class="font-bold text-[5px] lg:text-[7px] leading-[10px] md:leading-none">ITINERARIO Y HORAS</h3>
                            <p class="text-[5px] lg:text-[7px] leading-[10px] md:leading-none">{{$itinerario->recorrido}}</p>
                        </div>
                    </article>
                    
                    <article class="flex justify-center mt-8 md:mb-8">
                        <figure class="w-[50%]">
                            <img src="../img/{{$itinerario->imagen}}" alt="Imagen Itinerario">
                        </figure>
                    </article>
                </div>
             @endforeach
        @endforeach
    </div>

    {{-- <div class="bg-white p-4 md:p-8 w-full">
        <article class="flex flex-col gap-4 md:gap-8">
            <h1 class="text-3xl md:text-4xl text-center">{{$itinerarios[1][0]->dia}}</h1>
            <h2 class="text-2xl md:text-2xl text-center">Nombre Hermandad y Escudo</h2><img>
            <div>
                <h3 class="font-bold text-xs md:text-base">PASOS</h3>
                <p class="text-xs md:text-base"></p>
            </div>
            <div>
                <h3 class="font-bold text-xs md:text-base">MÚSICA</h3>
                <p class="text-xs md:text-base"></p>
            </div>

            <div>
                <h3 class="font-bold text-xs md:text-base">¿NAZARENOS?</h3>
                <p class="text-xs md:text-base"></p>
            </div>

            <div>
                <h3 class="font-bold text-xs md:text-base">ITINERARIO Y HORAS</h3>
                <p class="text-xs md:text-base">{{$itinerarios[1][0]->recorrido}}</p>
            </div>
        </article>
        
        <article class="flex justify-center mt-8 md:mt-16">
            <figure class="w-[40rem]">
                <img src="../img/{{$itinerarios[1][0]->imagen}}" alt="Imagen Itinerario">
            </figure>
        </article>
    </div> --}}
@endsection