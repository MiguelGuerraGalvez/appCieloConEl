@vite('resources/css/app.css')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar Usuario</title>
</head>
<body>
    <form action="{{ route('principal.updateUsuario') }}" method="post" enctype="multipart/form-data">
        @csrf

        <figure>
            <img src="../img/{{ $usuario->icon }}" alt="Icono usuario">
        </figure>
        
        <input type="hidden" name="modificar_usuario_id" id="modificar_usuario_id" value="{{ $usuario->id }}">
        <input type="file" name="modificar_usuario_icono" id="modificar_usuario_icono">
        <input type="text" name="modificar_usuario_nombre" id="modificar_usuario_nombre" value="{{ $usuario->name }}" required>
        <input type="submit" name="modificar_usuario_insertar" id="modificar_usuario_insertar" value="MODIFICAR">
    </form>

    <a href="{{ route('principal') }}">VOLVER ATRÁS</a>
</body>
</html>