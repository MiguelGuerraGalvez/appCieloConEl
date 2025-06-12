@vite('resources/css/app.css')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmar Eliminar Itinerario</title>
</head>
<body>
    <h2>¿ESTAS SEGUR@ DE QUE QUIERE BORRAR ESTE ITINERARIO?</h2>
    <form action="{{ route('hermandad.deleteItinerario') }}" method="post">
        @csrf
        <input type="hidden" name="itinerario_eliminar" value="{{ $itinerario->id }}">
        <input type="submit" name="si" id="si" value="ELIMINAR">
    </form>
    <form action="{{ route('hermandad.administracion', ['hermandad' => Auth::user()->name]) }}" method="get">
        @csrf
        <input type="submit" name="no" id="no" value="DECLINAR">
    </form>
</body>
</html>