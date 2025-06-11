@vite('resources/css/app.css')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>¿ESTAS SEGUR@ DE QUE QUIERE BORRAR ESTE CARTEL?</h2>
    <form action="{{ route('consejo.deleteCarteles') }}" method="post">
        @csrf
        <input type="hidden" name="cartel" id="cartel" value="{{ $cartel->id }}">
        <input type="submit" name="si" id="si" value="ELIMINAR">
    </form>
    <form action="{{ route('consejo.administracion') }}" method="get">
        @csrf
        <input type="hidden" name="cartel" id="cartel" value="{{ $cartel->id }}">
        <input type="submit" name="no" id="no" value="DECLINAR">
    </form>
</body>
</html>