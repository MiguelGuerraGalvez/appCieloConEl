<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar Cartel</title>
    <link rel="icon" type="image/png" href="{{ asset('img/LOGO.png') }}">
    @vite('resources/css/app.css')
</head>
<body class="bg-[#EBEBEB] h-full w-full flex items-center justify-center">
    <section>
        <h1 class="text-3xl md:text-4xl text-center font-bold mb-4">MODIFICAR CARTEL</h1>
        
        <form class="flex flex-col items-center justify-evenly gap-4 w-full max-w-full" action="{{ route('consejo.updateCarteles') }}" method="post" enctype="multipart/form-data">
            @csrf
    
            <figure class="w-[10rem]">
                <img class="w-full" src="../img/{{ $cartel->imagen }}" alt="Cartel {{ $cartel->anio }}">
            </figure>
            
            <div class="grid lg:grid-cols-2 gap-4 w-full max-w-full">
                <input type="hidden" name="modificar_cartel_id" id="modificar_cartel_id" value="{{ $cartel->id }}">

                <div class="col-span-full flex gap-4 justify-center items-center">
                    <label class="md:text-xl " for="modificar_cartel_imagen">Imagen del cartel</label>
                    <input class="py-2 border-none md:text-xl rounded" type="file" name="modificar_cartel_imagen" id="modificar_cartel_imagen">
                </div>

                <input class="w-full px-3 py-2 border border-gray-300 rounded mt-1" type="text" name="modificar_cartel_autor" id="modificar_cartel_autor" placeholder="Escriba aquí el autor..." value="{{ $cartel->autor }}" required>
                <input class="w-full px-3 py-2 border border-gray-300 rounded mt-1" type="number" min="0" name="modificar_cartel_anio" id="modificar_cartel_anio" placeholder="Escriba aquí el año..." value="{{ $cartel->anio }}" required>

                <div class="col-span-full flex justify-center">
                    <input class="max-w-full w-full lg:w-1/4 text-lg md:text-xl lg:text-2xl bg-[#FFC060] text-black font-semibold px-4 py-2 rounded hover:bg-[#F9D193] cursor-pointer" type="submit" name="modificar_cartel_insertar" id="modificar_cartel_insertar" value="MODIFICAR">
                </div>
            </div>
        </form>
    
        <div class="flex items-center justify-center pb-8">
            <a class="text-xl md:text-2xl underline mt-4" href="{{ route('consejo.administracion') }}">VOLVER ATRÁS</a>
        </div>
    </section>
</body>
</html>