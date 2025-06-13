@extends('layouts.plantillaAppCieloConEL')

@section('title', 'Itinerarios')

@section('logo', '../')

@section('image1')
    <section class="bg-no-repeat bg-cover bg-center w-full h-[25vh] md:h-[50vh] lg:h-[75vh]" style="background-image: url(../img/HEADER_ITINERARIOS.jpg);"> <!-- La imagen estaría en el fondo de pantalla -->
    </section>
@endsection

@section('content')

    <h3 class="text-[FFC060] text-3xl md:text-5xl lg:text-7xl text-center md:mb-8 lg:mb-24">ITINERARIOS</h3>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-8 gap-y-24 mt-8 w-[80vw]">
        @foreach ($itinerarios as $itin)
            @foreach ($itin as $itinerario)
                <a href="{{ route('consejo.itinerario', $itinerario->id) }}">
                    <div>
                        <div class="bg-white p-2 md:p-4 lg:p-8 lg:w-[17rem] h-[20rem] lg:h-[30rem] overflow-hidden">
                            <article class="flex flex-col justify-between md:gap-1 lg:gap-2">
                                <h1 class="text-[7px] lg:text-xs text-center leading-[10px] md:leading-none">{{$itinerario->dia}}</h1>
                                <h2 class="text-[5px] lg:text-[7px] text-center leading-[10px] md:leading-none">Nombre Hermandad y Escudo</h2><img>
                                <div>
                                    <h3 class="font-bold text-[5px] lg:text-[7px] leading-[10px] md:leading-none">PASOS</h3>
                                    @foreach ($itinerario->titulares as $titular)
                                        <p class="text-[5px] lg:text-[7px] leading-[10px] md:leading-none">{{$titular->nombre_completo}}</p>
                                    @endforeach
                                </div>
                                <div>
                                    <h3 class="font-bold text-[5px] lg:text-[7px] leading-[10px] md:leading-none">MÚSICA</h3>
                                    @foreach ($itinerario->titulares as $titular)
                                        <p class="text-[5px] lg:text-[7px] leading-[10px] md:leading-none">{{$titular->banda}}</p>
                                    @endforeach
                                </div>
                    
                                <div>
                                    <h3 class="font-bold text-[5px] lg:text-[7px] leading-[10px] md:leading-none">NAZARENOS</h3>
                                    @foreach ($itinerario->titulares as $titular)
                                        <p class="text-[5px] lg:text-[7px] leading-[10px] md:leading-none">{{$titular->nazarenos}}</p>
                                    @endforeach
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
        
                        <p class="text-center mt-8 text-xs md:text-sm lg:text-base">{{$hermandades[$itinerario->id_hermandad - 1]->nombre}}</p>
                        <p class="text-center text-xs md:text-sm lg:text-base">{{$itinerario->dia}}</p>
                    </div>
                </a>
             @endforeach
        @endforeach
    </div>

    <a class="mt-8 lg:mt-24 text-3xl underline" href="{{ route('consejo') }}">VOLVER ATRÁS</a>
@endsection