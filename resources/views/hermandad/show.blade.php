@extends('layouts.plantillaAppCieloConEL')

@section('title', 'Hermandad '.$hermandad)

@section('image1')
    <section class="bg-no-repeat bg-cover bg-[position:0_20%] w-full h-[25vh] md:h-[50vh] lg:h-[75vh]" style="background-image: url(../img/{{$her->header}})"> <!-- La imagen estaría en el fondo de pantalla -->
    </section>
@endsection

@section('content')

    <div class="w-full flex flex-col lg:flex-row items-center justify-evenly text-center gap-4 lg:gap-0">
        <figure class="w-40 h-40 lg:w-60 lg:h-60">
            <img class="w-full h-[10rem] lg:h-[15rem] object-contain" src="../img/{{$her->escudo}}" alt="Escudo Hermandad {{$her->nombre}}">
        </figure>

        <p>{{$her->nombre_completo}}</p>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide reveal" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php
                for ($i = 0; $i<count($titul); $i++){
                    if ($i == 0){
            ?>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <?php
                    }else{
            ?>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?=$i?>" aria-label="Slide <?=$i+1?>"></button>
            <?php

                    }
                }
            ?>
        </div>
        <div class="carousel-inner">
            <?php
                for ($i = 0; $i<count($titul); $i++){
                    if ($i == 0){
            ?>
              <div class="carousel-item active">
                <img src="../img/<?=$titul[0]->imagen?>" class="d-block w-100" alt="Carousel">
                <div class="carousel-caption d-none d-md-block">
                  <h5 class="fs-1"><?=$titul[0]->nombre_completo?></h5>
                </div>
              </div>
            <?php
                    }else{
            ?>
              <div class="carousel-item">
                <img src="../img/<?=$titul[$i]->imagen?>" class="d-block w-100" alt="Carousel">
                <div class="carousel-caption d-none d-md-block">
                  <h5 class="fs-1"><?=$titul[$i]->nombre_completo?></h5>
                </div>
              </div>
            <?php
                    }
                }
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
          </div>
@endsection