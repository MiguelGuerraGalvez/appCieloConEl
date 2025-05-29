@extends('layouts.plantillaAppCieloConEL')

@section('title', 'Pregones')

@section('logo', '../')

@section('image1')
    <section class="bg-no-repeat bg-cover bg-center w-full h-[25vh] md:h-[50vh] lg:h-[75vh]" style="background-image: url(../img/HEADER_PREGONES.jpg);"> <!-- La imagen estaría en el fondo de pantalla -->
    </section>
@endsection

@section('content')

    <h3 class="text-[FFC060] text-3xl md:text-5xl lg:text-7xl text-center mb-8 md:mb-16 lg:mb-24">PREGONES</h3>

    <table class="dark:text-gray-400 bg-[#DFDFDF] border-2 border-black text-center w-full">
        <tr class="text-xl md:text-3xl lg:text-5xl">
            <th class="border-2 border-black p-2 md:p-6">AÑO</th>
            <th class="border-2 border-black p-2 md:p-6">PREGONERO</th>
        </tr>

        @foreach ($pregones as $pregon)
            <tr class="text-md md:text-xl lg:text-3xl">
                <td class="border-2 border-black p-2 md:p-6">{{$pregon->anio}}</td>
                <td class="border-2 border-black p-2 md:p-6">{{$pregon->pregonero}}</td>
            </tr>
        @endforeach
    </table>

    <a class="mt-8 md:mt-16 lg:mt-24 md:text-3xl underline" href="{{ route('consejo') }}">VOLVER ATRÁS</a>

@endsection