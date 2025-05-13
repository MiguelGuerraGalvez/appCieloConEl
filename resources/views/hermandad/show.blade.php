@extends('layouts.plantillaAppCieloConEL')

@section('title', 'Hermandad '.$hermandad)

@section('image1')
    <section class="bg-[url(./img/HEADER_ENLACE_HERMANDADES.jpg)] w-full h-[25vh] md:h-[50vh] lg:h-[75vh]"> <!-- La imagen estaría en el fondo de pantalla -->
    </section>
@endsection

@section('content')
    <h1>Bienvenido a la página de la hermandad <?php echo $hermandad?>.</h1>
@endsection