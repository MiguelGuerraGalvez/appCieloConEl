<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar Cartel</title>
</head>
<body>
    <form action="{{ route('consejo.updatePregoneros') }}" method="post" enctype="multipart/form-data">
        @csrf
        
        <input type="hidden" name="modificar_pregon_id" id="modificar_pregon_id" value="{{ $cartel->id }}">
        <input type="text" name="modificar_pregon_pregonero" id="modificar_pregon_pregonero" placeholder="Escriba aquí el pregonero...">
        <input type="text" name="modificar_pregon_anio" id="modificar_pregon_anio" placeholder="Escriba aquí el año...">
        <input type="submit" name="modificar_pregon_insertar" id="modificar_pregon_insertar" value="MODIFICAR">
    </form>

    <a href="{{ route('consejo.administracion') }}">VOLVER ATRÁS</a>
</body>
</html>