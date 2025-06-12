<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar Pregon</title>
</head>
<body>
    <form action="{{ route('consejo.updatePregones') }}" method="post" enctype="multipart/form-data">
        @csrf
        
        <input type="hidden" name="modificar_pregon_id" id="modificar_pregon_id" value="{{ $pregon->id }}">
        <input type="text" name="modificar_pregon_pregonero" id="modificar_pregon_pregonero" placeholder="Escriba aquí el pregonero..." value="{{ $pregon->pregonero }}" required>
        <input type="number" name="modificar_pregon_anio" id="modificar_pregon_anio" placeholder="Escriba aquí el año..." value="{{ $pregon->anio }}">
        <input type="submit" name="modificar_pregon_insertar" id="modificar_pregon_insertar" value="MODIFICAR">
    </form>

    <a href="{{ route('consejo.administracion') }}">VOLVER ATRÁS</a>
</body>
</html>