@vite('resources/css/app.css')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administración Consejo</title>
</head>
<body>
    <section>
        <h1>ADMINISTRACIÓN DE ITINERARIOS</h1>

        <div>
            @foreach ($itinerariosNoAceptados as $itinerario)
                <article>
                    <h4>{{ $itinerario->dia }}</h4>
                    <h5>Nazarenos</h5>
                    <p>{{ $itinerario->nazarenos }}</p>
                    <p>{{ $itinerario->recorrido }}</p>

                    <form action="{{ route('consejo.aceptarItinerario') }}" method="post">
                        @csrf
                        <input type="hidden" name="itinerario" id="itinerario" value="{{ $itinerario->id }}">
                        <input type="submit" name="itinerario_aceptar" id="itinerario_aceptar" value="ACEPTAR">
                    </form>

                    <form action="{{ route('consejo.declinarItinerario') }}" method="post">
                        @csrf
                        <input type="hidden" name="itinerario" id="itinerario" value="{{ $itinerario->id }}">
                        <input type="submit" name="itinerario_declinar" id="itinerario_declinar" value="DECLINAR">
                    </form>
                </article>
            @endforeach
        </div>
    </section>

    <div class="bg-[#8C52FF] h-4 max-w-full"></div>

    <section>
        <section>ADMINISTRACIÓN DE NUEVAS HERMANDADES</section>

        <div>
            @foreach ($nuevasHermandades as $hermandad)
                <article>
                    <h3>{{ $hermandad->nombre }}</h3>
                    <h4>{{ $hermandad->nombre_completo }}</h4>
                    <figure>
                        <img src="../img/{{ $hermandad->escudo }}" alt="Escudo Hermandad Nueva {{ $hermandad->nombre }}">
                    </figure>

                    <form action="{{ route('consejo.aceptarHermandad') }}" method="post">
                        @csrf
                        <input type="hidden" name="hermandad" id="hermandad" value="{{ $hermandad->id }}">
                        <input type="submit" name="hermandad_aceptar" id="hermandad_aceptar" value="ACEPTAR">
                    </form>

                    <form action="{{ route('consejo.declinarHermandad') }}" method="post">
                        @csrf
                        <input type="hidden" name="hermandad" id="hermandad" value="{{ $hermandad->id }}">
                        <input type="submit" name="hermandad_declinar" id="hermandad_declinar" value="DECLINAR">
                    </form>
                </article>
            @endforeach
        </div>
    </section>

    <div class="bg-[#8C52FF] h-4 max-w-full"></div>

    <section>
        <h1>ADMINISTRACIÓN DE CARTELES</h1>

        <table>
            <tr>
                <th>AÑO</th>
                <th>AUTOR</th>
                <th colspan="2">ACCIONES</th>
            </tr>
            
            @foreach ($carteles as $cartel)
                <tr>
                    <td>{{ $cartel->anio }}</td>
                    <td>{{ $cartel->autor }}</td>
                    <td>
                        <form action="{{ route('consejo.modificarCarteles') }}" method="post">
                            @csrf
                            <input type="hidden" name="cartel" id="cartel" value="{{ $cartel->id }}">
                            <input type="submit" name="cartel_modificar" id="cartel_modificar" value="MODIFICAR">
                        </form>
                    </td>

                    <td>
                        <form action="{{ route('consejo.eliminarCarteles') }}" method="post">
                            @csrf
                            <input type="hidden" name="cartel" id="cartel" value="{{ $cartel->id }}">
                            <input type="submit" name="cartel_eliminar" id="cartel_eliminar" value="ELIMINAR">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        <div>
            <form action="{{ route('consejo.insertarCarteles') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="nuevo_cartel_id_consejo" id="nuevo_cartel_id_consejo" value="{{ Auth::user()->id }}">
                <input type="file" name="nuevo_cartel_imagen" id="nuevo_cartel_imagen">
                <input type="text" name="nuevo_cartel_autor" id="nuevo_cartel_autor" placeholder="Escriba aquí el autor...">
                <input type="number" min="0" name="nuevo_cartel_anio" id="nuevo_cartel_anio" placeholder="Escriba aquí el año...">
                <input type="submit" name="nuevo_cartel_insertar" id="nuevo_cartel_insertar" value="INSERTAR">
            </form>
        </div>
    </section>

    <div class="bg-[#8C52FF] h-4 max-w-full"></div>

    <section>
        <h1>ADMINISTRACIÓN DE PREGONEROS</h1>

        <table>
            <tr>
                <th>AÑO</th>
                <th>PREGONERO</th>
                <th colspan="2">ACCIONES</th>
            </tr>
            
            @foreach ($pregones as $pregon)
                <tr>
                    <td>{{ $pregon->anio }}</td>
                    <td>{{ $pregon->pregonero }}</td>
                    <td>
                        <form action="{{ route('consejo.modificarPregoneros') }}" method="post">
                            @csrf
                            <input type="hidden" name="pregon" id="pregon" value="{{ $pregon->id }}">
                            <input type="submit" name="pregon_modificar" id="pregon_modificar" value="MODIFICAR">
                        </form>
                    </td>

                    <td>
                        <form action="{{ route('consejo.eliminarPregoneros') }}" method="post">
                            @csrf
                            <input type="hidden" name="pregon" id="pregon" value="{{ $pregon->id }}">
                            <input type="submit" name="pregon_eliminar" id="pregon_eliminar" value="ELIMINAR">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        <div>
            <form action="{{ route('consejo.insertarPregoneros') }}" method="post">
                @csrf
                <input type="text" name="nuevo_pregon_pregonero" id="nuevo_pregon_pregonero" placeholder="Escriba aquí el pregonero...">
                <input type="text" name="nuevo_pregon_anio" id="nuevo_pregon_anio" placeholder="Escriba aquí el año...">
                <input type="submit" name="nuevo_pregon_insertar" id="nuevo_pregon_insertar" value="INSERTAR">
            </form>
        </div>
    </section>

    <a href="{{ route('principal') }}">VOLVER ATRÁS</a>
</body>
</html>