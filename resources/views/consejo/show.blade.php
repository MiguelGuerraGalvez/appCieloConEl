@vite('resources/css/app.css')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Itinerario</title>
</head>
<body class="flex items-center justify-center">
    <section class="flex flex-col items-center justify-between w-full py-[2rem] p-[2rem] md:p-[4rem] text-lg max-w-[100rem]">
        <div class="bg-white p-4 md:p-8 w-full">
            <article class="flex flex-col gap-4 md:gap-8">
                <h1 class="text-xl md:text-5xl text-center">{{$itinerario->dia}}</h1>
    
                <div class="flex flex-col lg:flex-row items-center justify-evenly">
                    <figure class="w-20 h-20 md:w-40 md:h-40 lg:w-60 lg:h-60">
                        <img class="w-full md:h-[10rem] lg:h-[15rem] object-contain" src="../../img/{{$hermandad->escudo}}" alt="Escudo">
                    </figure>
                    <h2 class="text-sm md:text-2xl text-center lg:order-first lg:w-[75%]">{{$hermandad->nombre_completo}}</h2>
                </div>
                
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
                    <p class="text-xs md:text-base">{{$itinerario->recorrido}}</p>
                </div>
            </article>
            
            <article class="flex justify-center mt-8 md:mt-16">
                <figure class="w-[40rem]">
                    <img src="../../img/{{$itinerario->imagen}}" alt="Imagen Itinerario">
                </figure>
            </article>
        </div>
    </section>
</body>
</html>

    