@vite('resources/css/app.css')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar Cartel</title>
</head>
<body>
    <form action="{{ route('consejo.updateCarteles') }}" method="post" enctype="multipart/form-data">
        @csrf

        <figure>
            <img src="../img/{{ $cartel->imagen }}" alt="Cartel {{ $cartel->anio }}">
        </figure>
        
        <input type="hidden" name="modificar_cartel_id" id="modificar_cartel_id" value="{{ $cartel->id }}">
        <input type="file" name="modificar_cartel_imagen" id="modificar_cartel_imagen">
        <input type="text" name="modificar_cartel_autor" id="modificar_cartel_autor" placeholder="Escriba aquí el autor..." value="{{ $cartel->autor }}" required>
        <input type="number" min="0" name="modificar_cartel_anio" id="modificar_cartel_anio" placeholder="Escriba aquí el año..." value="{{ $cartel->anio }}" required>
        <input type="submit" name="modificar_cartel_insertar" id="modificar_cartel_insertar" value="MODIFICAR">
    </form>

    <a href="{{ route('consejo.administracion') }}">VOLVER ATRÁS</a>
</body>
</html>