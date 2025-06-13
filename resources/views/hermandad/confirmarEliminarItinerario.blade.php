@vite('resources/css/app.css')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmar Eliminar Itinerario</title>
    <link rel="icon" type="image/png" href="{{ asset('img/LOGO.png') }}">
</head>
<body class="bg-[#EBEBEB] flex flex-col items-center justify-center gap-32 h-full w-full">
    <h1 class="text-3xl md:text-4xl text-center font-bold mb-4">¿ESTAS SEGUR@ DE QUE QUIERE BORRAR ESTE ITINERARIO?</h1>
    
    <section class="flex items-center justify-evenly w-full">
        <form action="{{ route('hermandad.deleteItinerario') }}" method="post">
            @csrf
            <input type="hidden" name="itinerario_eliminar" value="{{ $itinerario->id }}">
            <input class="text-lg md:text-xl lg:text-2xl bg-[#FFC060] text-black font-semibold px-4 py-2 rounded hover:bg-[#F9D193] cursor-pointer" type="submit" name="si" id="si" value="ELIMINAR">
        </form>
        <form action="{{ route('hermandad.administracion', ['hermandad' => Auth::user()->name]) }}" method="get">
            @csrf
            <input class="text-lg md:text-xl lg:text-2xl bg-[#FFC060] text-black font-semibold px-4 py-2 rounded hover:bg-[#F9D193] cursor-pointer" type="submit" name="no" id="no" value="DECLINAR">
        </form>
    </section>
</body>
</html>