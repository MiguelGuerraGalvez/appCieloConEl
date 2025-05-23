@extends('layouts.plantillaAppCieloConEL')

@section('title', 'Hermandad '.$hermandad)

@section('logo', '../')

@section('image1')
    <section class="bg-no-repeat bg-cover bg-center w-full h-[25vh] md:h-[50vh] lg:h-[75vh]" style="background-image: url(../img/{{$her->header}})"> <!-- La imagen estaría en el fondo de pantalla -->
    </section>
@endsection

@section('content')

    <div class="w-full flex flex-col lg:flex-row items-center justify-evenly text-center gap-4 lg:gap-0">
        <figure class="w-40 h-40 lg:w-60 lg:h-60">
            <img class="w-full h-[10rem] lg:h-[15rem] object-contain" src="../img/{{$her->escudo}}" alt="Escudo Hermandad {{$her->nombre}}">
        </figure>

        <p>{{$her->nombre_completo}}</p>
    </div>

    <div id="carousel" class="relative overflow-hidden w-full h-[500px] reveal">

    <!-- Slides -->
    <div id="slides" class="relative w-full h-full">
        <?php for ($i = 0; $i < count($titul); $i++): ?>
            <div 
                class="absolute inset-0 w-full h-full transition-opacity duration-700 <?= $i === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' ?>"
            >
                <img src="../img/<?=$titul[$i]->imagen?>" alt="Carousel" class="object-cover w-full h-full">
                <div class="absolute bottom-0 left-0 right-0 bg-black/50 text-white p-4">
                    <h5 class="text-3xl"><?=$titul[$i]->nombre_completo?></h5>
                </div>
            </div>
        <?php endfor; ?>
    </div>

    <!-- Indicadores -->
    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
        <?php for ($i = 0; $i < count($titul); $i++): ?>
            <button 
                class="indicator w-3 h-3 rounded-full <?= $i === 0 ? 'bg-white' : 'bg-white/50' ?>"
                data-slide="<?=$i?>"
            ></button>
        <?php endfor; ?>
    </div>

    <!-- Controles -->
    <button id="prevBtn" class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/50 text-white p-2 rounded-full z-10">
        ‹
    </button>
    <button id="nextBtn" class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/50 text-white p-2 rounded-full z-10">
        ›
    </button>    
</div>

<div>
    <h2>ITINERARIOS</h2>

    <?php 
        foreach ($itin as $itinerario) {
    ?>

            <p><span class="underline"><?= $itinerario->dia ?>:</span> <?= $itinerario->recorrido ?></p>

    <?php 
        }
    ?>
</div>

<script>
    const slides = document.querySelectorAll("#slides > div");
    const indicators = document.querySelectorAll(".indicator");
    const nextBtn = document.getElementById("nextBtn");
    const prevBtn = document.getElementById("prevBtn");

    let activeSlide = 0;
    const totalSlides = slides.length;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle("opacity-100", i === index);
            slide.classList.toggle("opacity-0", i !== index);
            slide.classList.toggle("z-10", i === index);
            slide.classList.toggle("z-0", i !== index);
        });
        indicators.forEach((dot, i) => {
            dot.classList.toggle("bg-white", i === index);
            dot.classList.toggle("bg-white/50", i !== index);
        });
        activeSlide = index;
    }

    nextBtn.addEventListener("click", () => {
        const next = (activeSlide + 1) % totalSlides;
        showSlide(next);
    });

    prevBtn.addEventListener("click", () => {
        const prev = (activeSlide - 1 + totalSlides) % totalSlides;
        showSlide(prev);
    });

    indicators.forEach(dot => {
        dot.addEventListener("click", () => {
            const index = parseInt(dot.getAttribute("data-slide"));
            showSlide(index);
        });
    });

    // Auto-slide opcional
    setInterval(() => {
        const next = (activeSlide + 1) % totalSlides;
        showSlide(next);
    }, 5000);

</script>


    {{-- <div id="carouselExampleCaptions" class="carousel slide reveal" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php
                // for ($i = 0; $i<count($titul); $i++){
                //     if ($i == 0){
            ?>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <?php
                    // }else{
            ?>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?=$i?>" aria-label="Slide <?=$i+1?>"></button>
            <?php

                //     }
                // }
            ?>
        </div>
        <div class="carousel-inner">
            <?php
                // for ($i = 0; $i<count($titul); $i++){
                //     if ($i == 0){
            ?>
              <div class="carousel-item active">
                <img src="../img/<?=
                // $titul[0]->imagen
                ?>" class="d-block w-100" alt="Carousel">
                <div class="carousel-caption d-none d-md-block">
                  <h5 class="fs-1"><?=
                    // $titul[0]->nombre_completo
                    ?></h5>
                </div>
              </div>
            <?php
                    // }else{
            ?>
              <div class="carousel-item">
                <img src="../img/<?=
                  // $titul[$i]->imagen
                  ?>" class="d-block w-100" alt="Carousel">
                <div class="carousel-caption d-none d-md-block">
                  <h5 class="fs-1"><?=
                    // $titul[$i]->nombre_completo
                    ?></h5>
                </div>
              </div>
            <?php
                //     }
                // }
            ?>
          </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div> --}}
@endsection