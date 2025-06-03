@vite('resources/css/app.css')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administración {{Auth::user()->name}}</title>
</head>
<body class="bg-[#EBEBEB] flex justify-center md:pt-8">
    <div class="w-[80vw] mt-8">
        <section>
            <h1>CREA EL ITINERARIO</h1>

            <form action="" method="post">
                <select name="dia_itinerario_nuevo" id="dia_itinerario_nuevo" required>
                    <option class="font-bold" value="">--SELECCIONE EL DÍA DE SALIDA--</option>

                    @foreach ($dias as $dia)
                        <option value="{{$dia->id}}">{{$dia->dia}}</option>
                    @endforeach
                </select>

                @foreach ($titulares as $titular)
                    <input type="checkbox" name="titular_itinerario_nuevo" id="titular_{{ $titular->id }}_itinerario_nuevo" value="{{ $titular->id }}">
                    <label for="titular_{{ $titular->id }}_itinerario_nuevo">{{ $titular->nombre_corto }}</label>
                @endforeach
                
                <label for="nazarenos">Ropa de nazareno: </label>
                <input type="text" name="nazarenos" id="nazarenos">

                <textarea name="itinerario_nuevo" id="itinerario_nuevo" cols="30" rows="10" placeholder="Escriba aquí el itinerario..."></textarea>

                <input type="submit" name="enviar_itinerario_nuevo" id="enviar_itinerario_nuevo" value="ENVIAR">
            </form>
        </section>

        <div class="bg-[#8C52FF] h-4 max-w-full"></div>

        <section>
            <h1>ITINERARIOS ACEPTADOS</h1>
            
            @foreach ($itinerarios_aceptados as $itinerario)
                <div>
                    <form action="" method="post">
                        <h4>{{$itinerario->dia}}</h4>
                        <p>{{$itinerario->recorrido}}</p>

                        <input type="hidden" name="itinerario_aceptado" value="{{ $itinerario->id }}">
                        <input type="submit" value="ELIMINAR">
                    </form>
                </div>
            @endforeach

            @if (count($itinerarios_aceptados) == 0)
                <div>
                    <p>No hay itinerarios aceptatos</p>
                </div>
            @endif
        </section>

        <div class="bg-[#8C52FF] h-4 max-w-full"></div>

        <section>
            <h1>ITINERARIOS NO ACEPTADOS</h1>
            
            @foreach ($itinerarios_no_aceptados as $itinerario)
                <div>
                    <form action="" method="post">
                        <h4>{{$itinerario->dia}}</h4>
                        <p>{{$itinerario->recorrido}}</p>

                        <input type="hidden" name="itinerario_aceptado" value="{{ $itinerario->id }}">
                        <input type="submit" value="ELIMINAR">
                    </form>
                </div>

            @endforeach

            @if (count($itinerarios_no_aceptados) == 0)
                <div>
                    <p>No hay itinerarios sin aceptar</p>
                </div>
            @endif
        </section>

        <div class="bg-[#8C52FF] h-4 max-w-full"></div>

        <section>
            <h1>CONTRATA A LA BANDA</h1>
            
            <form action="" method="post">
                <select name="titular_banda" id="titular_banda" required>
                    <option class="font-bold" value="">--SELECCIONE EL TITULAR--</option>

                    @foreach ($titulares as $titular)
                        <option value="{{$titular->id}}">{{$titular->nombre_completo}}</option>
                    @endforeach
                </select>

                <select name="formacion_banda" id="formacion_banda" required>
                    <option class="font-bold" value="">--SELECCIONE LA FORMACIÓN MUSICAL--</option>

                    @foreach ($formaciones as $formacion)
                        <option value="{{$formacion->id}}">{{$formacion->abreviatura}}</option>
                    @endforeach
                </select>

                <input type="text" name="banda" id="banda" placeholder="Escriba aquí el nombre de la banda...">

                <input type="submit" name="enviar_banda" id="enviar_banda" value="ENVIAR">
            </form>
        </section>

        <div class="bg-[#8C52FF] h-4 max-w-full"></div>

        <section>
            <h1>ADMINISTRACIÓN DE HERMANOS</h1>
            <h3>{{ $hermandad->hermanos }} HERMANOS</h3>

            <form action="" method="post">
                <input type="text" name="nuevos_hermanos" id="nuevos_hermanos" placeholder="Nº de nuevos hermanos">
                <input type="submit" name="enviar_nuevos_hermanos" id="enviar_nuevos_hermanos" value="ALTA">
            </form>

            <form action="" method="post">
                <input type="text" name="antiguos_hermanos" id="antiguos_hermanos" placeholder="Nº de antiguos hermanos">
                <input type="submit" name="enviar_antiguos_hermanos" id="enviar_antiguos_hermanos" value="BAJA">
            </form>
        </section>

        <div class="bg-[#8C52FF] h-4 max-w-full"></div>

        <section>
            <h1>ADMINISTRACIÓN DE LA CUOTA</h1>
            <h3>{{ $hermandad->cuota }}€</h3>

            <form action="" method="post">
                <input type="text" name="cuota" id="cuota" placeholder="Introduce la nueva cuota de hermano...">
                <input type="submit" name="enviar_cuota" id="enviar_cuota" value="MODIFICAR">
            </form>
        </section>

        <div class="bg-[#8C52FF] h-4 max-w-full"></div>

        <section>
            <h1>IMÁGENES</h1>

            <form action="" method="post">
                <label for="header">Imagen de cabecera</label>
                <input type="file" name="header" id="header">
                <input type="hidden" name="header_antiguo" id="header_antiguo" value="{{ $hermandad->imagen }}">
                <input type="submit" value="ENVIAR">
            </form>

            @foreach ($titulares as $titular)    
                <form action="" method="post">
                    <label for="imagen_{{ $titular->id }}">Imagen de {{$titular->nombre_completo}}</label>
                    <input type="file" name="imagen_{{ $titular->id }}" id="imagen_{{ $titular->id }}">
                    <input type="hidden" name="imagen_{{ $titular->id }}_antiguo" id="imagen_{{ $titular->id }}_antiguo" value="{{ $titular->imagen }}">
                    <input type="submit" value="ENVIAR">
                </form>
            @endforeach
        </section>

        <a href="{{ route('principal') }}">VOLVER ATRÁS</a>
    </div>
    
</body>
</html>