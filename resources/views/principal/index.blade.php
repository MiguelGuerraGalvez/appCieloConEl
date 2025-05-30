@extends('layouts.plantillaAppCieloConEL')

@section('title', 'Principal')

@section('image1')
    <section class="bg-cover w-full h-[25vh] md:h-[50vh] lg:h-[75vh] bg-no-repeat bg-[position:0_25%]" style="background-image: url(img/HEADER_PRINCIPAL.jpg);"> <!-- La imagen estaría en el fondo de pantalla -->
    </section>
@endsection

@section('content')
    <h1 class="text-3xl md:text-4xl text-center">Bienvenido a la página principal de App Cielo Con Él</h1>
    
    <div class="mt-24 text-[FFC060] text-2xl">
        @foreach ($consejos as $consejo)
        <a href="{{ route('consejo') }}">
            <article class="text-center flex flex-col items-center justify-center">
                <figure class="w-40 h-40 lg:w-60 lg:h-60">
                    <img class="w-full h-[10rem] lg:h-[15rem] object-contain" src="img/{{$consejo->escudo}}" alt="Escudo Consejo">
                </figure>
                
                <p>{{$consejo->nombre}}</p>
            </article>
        </a>
        @endforeach
    </div>
    
    <h1 class="mt-24 mb-4 text-3xl md:text-4xl">Buscador</h1>
    
    
    <div class="relative w-[60vw] lg:w-[40vw] mx-auto mt-8">
        <input class="bg-[#C6C6C6] border-black border-2 rounded-full text-2xl w-full py-2 pl-4 pr-12 focus:outline-none" type="search" name="buscador" id="buscador" placeholder="Buscar...">

        <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none">
            <i class="fas fa-search text-black text-2xl"></i>
        </div>
    </div>


    <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none">
        <i class="fas fa-search text-black text-2xl"></i>
    </div>

    <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none">
        <img src="" alt="">
    </div>

    <div id="resultados" class="grid md:grid-cols-2 lg:grid-cols-3 gap-24 mt-24 text-[FFC060] text-2xl"></div>

    <script>
        const buscador = document.getElementById('buscador');

        function buscar() {
            let busqueda = buscador.value;

            fetch(`/busqueda?buscar=${busqueda}`)
            .then(response => response.json())
            .then(data => {
                let html = '';
                if (data.length > 0) {
                    data.forEach(hermandad => {
                        html += `
                        <a href="${hermandad.url}">
                            <article class="text-center flex flex-col items-center justify-center">
                                <figure class="w-40 h-40 lg:w-60 lg:h-60">
                                    <img class="w-full h-[10rem] lg:h-[15rem] object-contain" src="img/${hermandad.escudo}" alt="Escudo Hermandad ${hermandad.nombre}">
                                </figure>

                                <p>${hermandad.nombre}</p>
                            </article>
                        </a>
                        `;
                    });
                } else {
                    html = '<p>No se encontraron resultados.</p>';
                }
                document.getElementById('resultados').innerHTML = html;
            })
            .catch(error => console.error('Error:', error));
        }

        buscador.addEventListener('input', buscar);

        window.addEventListener('load', buscar);
    </script>

@endsection
