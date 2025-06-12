@vite('resources/css/app.css')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar Pregon</title>
</head>
<body class="bg-[#EBEBEB] h-full w-full flex items-center justify-center">
    <section class="w-[80vw]">
        <h1 class="text-3xl md:text-4xl text-center font-bold mb-4">MODIFICAR PREGÓN</h1>
        
        <form class="grid lg:grid-cols-2 gap-4 w-full max-w-full" action="{{ route('consejo.updatePregones') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <input type="hidden" name="modificar_pregon_id" id="modificar_pregon_id" value="{{ $pregon->id }}">
            <input class="w-full text-center px-3 py-2 border border-gray-300 rounded mt-1" type="text" name="modificar_pregon_pregonero" id="modificar_pregon_pregonero" placeholder="Escriba aquí el pregonero..." value="{{ $pregon->pregonero }}" required>
            <input class="w-full text-center px-3 py-2 border border-gray-300 rounded mt-1" type="number" name="modificar_pregon_anio" id="modificar_pregon_anio" placeholder="Escriba aquí el año..." value="{{ $pregon->anio }}">
            <div class="col-span-full flex justify-center">
                <input class="max-w-full w-full lg:w-1/4 text-lg md:text-xl lg:text-2xl bg-[#FFC060] text-black font-semibold px-4 py-2 rounded hover:bg-[#F9D193] cursor-pointer" type="submit" name="modificar_cartel_insertar" id="modificar_cartel_insertar" value="MODIFICAR">
            </div>
        </form>
    
        <div class="flex items-center justify-center pb-8">
            <a class="text-xl md:text-2xl underline mt-4" href="{{ route('consejo.administracion') }}">VOLVER ATRÁS</a>
        </div>
    </section>
</body>
</html>