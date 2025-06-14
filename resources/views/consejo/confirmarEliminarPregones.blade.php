<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmar Eliminar Pregones</title>
    <link rel="icon" type="image/png" href="{{ asset('img/LOGO.png') }}">
    @vite('resources/css/app.css')
</head>
<body class="bg-[#EBEBEB] flex flex-col items-center justify-center gap-32 h-full w-full">
    <h1 class="text-3xl md:text-4xl text-center font-bold mb-4">¿ESTAS SEGUR@ DE QUE QUIERE BORRAR ESTE PREGON?</h1>
    
    <section class="flex items-center justify-evenly w-full">
        <form action="{{ route('consejo.deletePregones') }}" method="post">
            @csrf
            <input type="hidden" name="pregon" id="pregon" value="{{ $pregon->id }}">
            <input class="text-lg md:text-xl lg:text-2xl bg-[#d83c3c] text-white font-semibold px-4 py-2 rounded hover:bg-[#a12b2b] cursor-pointer" type="submit" name="si" id="si" value="ELIMINAR">
        </form>
        <form action="{{ route('consejo.administracion') }}" method="get">
            @csrf
            <input class="text-lg md:text-xl lg:text-2xl bg-[#8b8b8b] text-black font-semibold px-4 py-2 rounded hover:bg-[#555555] cursor-pointer" type="submit" name="no" id="no" value="CANCELAR">
        </form>
    </section>
</body>
</html>