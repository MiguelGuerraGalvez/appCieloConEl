@extends('layouts.plantillaAppCieloConEL')

@section('title', 'Hermandad '.$hermandad)

@section('logo', '../')

@section('image1')
    <section class="bg-no-repeat bg-cover bg-center w-full h-[25vh] md:h-[50vh] lg:h-[75vh]" style="background-image: url(../img/{{$her->header}})">
    </section>
@endsection

@section('content')

    <!-- ESCUDO -->
    <div class="w-full flex flex-col lg:flex-row items-center justify-evenly text-center gap-4 mb-32">
        <!-- Botón que activa el modal -->
        <button id="openModal" class="w-40 h-40 lg:w-60 lg:h-60 focus:outline-none">
            <img class="w-full h-[10rem] lg:h-[15rem] object-contain" src="../img/{{$her->escudo}}" alt="Escudo Hermandad {{$her->nombre}}">
        </button>

        <p class="w-[90%] lg:text-3xl">{{$her->nombre_completo}}</p>
    </div>

    <!-- CAROUSEL -->
    <div id="carousel" class="relative overflow-hidden w-full h-[500px] reveal mb-32">
        <div id="slides" class="relative w-full h-full">
            <?php for ($i = 0; $i < count($titul); $i++): ?>
                <div class="absolute inset-0 w-full h-full transition-opacity duration-700 <?= $i === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' ?>">
                    <img src="../img/<?=$titul[$i]->imagen?>" alt="Carousel" class="object-cover w-full h-full">
                    <div class="absolute bottom-0 left-0 right-0 bg-black/50 text-white p-4">
                        <h5 class="text-3xl"><?=$titul[$i]->nombre_completo?></h5>
                    </div>
                </div>
            <?php endfor; ?>
        </div>

        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
            <?php for ($i = 0; $i < count($titul); $i++): ?>
                <button 
                    class="indicator w-3 h-3 rounded-full <?= $i === 0 ? 'bg-white' : 'bg-white/50' ?>"
                    data-slide="<?=$i?>">
                </button>
            <?php endfor; ?>
        </div>

        <button id="prevBtn" class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/50 text-white p-2 rounded-full z-10">
            ‹
        </button>
        <button id="nextBtn" class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/50 text-white p-2 rounded-full z-10">
            ›
        </button>    
    </div>

    <!-- ITINERARIOS -->
    <div>
        <h3 class="text-[FFC060] text-2xl text-center mb-8">ITINERARIOS</h3>
        <?php foreach ($itin as $itinerario): ?>
            <p class="mt-4"><span class="font-bold underline"><?= $itinerario->dia ?>:</span> <?= $itinerario->recorrido ?></p>
        <?php endforeach; ?>
    </div>

    <!-- MODAL -->
    <div id="escudoModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-8 rounded-lg max-w-lg w-[90%] relative">
            <button id="closeModal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-xl">&times;</button>
            <img class="w-full h-[10rem] lg:h-[15rem] object-contain" src="../img/{{$her->escudo}}" alt="Escudo Hermandad {{$her->nombre}}">
            <h2 class="text-2xl font-bold mb-4 text-center">Titulares:</h2>
            <?php for ($i = 0; $i < count($titul); $i++): ?>
                    <p><?=$titul[$i]->nombre_completo?></p>
            <?php endfor; ?>        
        </div>
    </div>

    <!-- SCRIPTS -->
    <script>
        // Modal
        const openModal = document.getElementById('openModal');
        const closeModal = document.getElementById('closeModal');
        const modal = document.getElementById('escudoModal');

        openModal.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        closeModal.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });

        // Carousel
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

        setInterval(() => {
            const next = (activeSlide + 1) % totalSlides;
            showSlide(next);
        }, 5000);
    </script>

@endsection
