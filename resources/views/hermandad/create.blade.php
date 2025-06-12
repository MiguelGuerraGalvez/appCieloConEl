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
        @if ($errors->any())
            <div class="bg-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="flex flex-col items-center gap-6" id="crear_itinerario">
            <h1 class="text-3xl md:text-4xl text-center font-bold">CREA EL ITINERARIO</h1>

            <form class="flex flex-col items-center gap-4 w-full max-w-full" id="itinerarioForm" action="{{ route('hermandad.nuevoItinerario') }}" method="post" enctype="multipart/form-data">
                @csrf

                <select class="w-full px-3 py-2 border border-gray-300 md:text-xl rounded cursor-pointer" name="dia_itinerario_nuevo" id="dia_itinerario_nuevo" required>
                    <option class="w-full font-bold text-left" value="">--SELECCIONE EL DÍA DE SALIDA--</option>
                    @foreach ($dias as $dia)
                        <option value="{{ $dia->id }}">{{ $dia->dia }}</option>
                    @endforeach
                </select>

                <div class="w-full flex flex-row gap-2 justify-evenly flex-wrap">
                    @foreach ($titulares as $titular)
                        <div>
                            <input type="checkbox" name="titular_{{ $titular->id }}_itinerario_nuevo" id="titular_{{ $titular->id }}_itinerario_nuevo" value="{{ $titular->id }}">
                            <label for="titular_{{ $titular->id }}_itinerario_nuevo" class="text-xl">{{ $titular->nombre_corto }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="flex flex-row gap-4 flex-wrap">
                    <div class="w-full text-left">
                        <label for="nazarenos_itinerario_nuevo" class="text-xl">Ropa de nazareno:</label>
                        <input class="w-full px-3 py-2 border border-gray-300 rounded mt-1" type="text" name="nazarenos_itinerario_nuevo" id="nazarenos_itinerario_nuevo" required>
                </div>

                <div class="flex flex-row gap-4 items-end w-full">
                    <div class="w-[30vw] flex-1 text-left">
                        <label for="hora_salida_itinerario_nuevo" class="text-xl">Hora de salida:</label>
                        <input class="w-full px-3 py-2 border border-gray-300 rounded mt-1" type="time" name="hora_salida_itinerario_nuevo" id="hora_salida_itinerario_nuevo" required>
                    </div>

                    <div class="flex-1 text-left">
                        <label for="imagen_itinerario_nuevo" class="text-xl">Imagen para el itinerario:</label>
                        <input class="w-full px-3 py-2 border-none rounded mt-1" type="file" name="imagen_itinerario_nuevo" id="imagen_itinerario_nuevo" required>
                    </div>

                </div>

                <textarea name="itinerario_nuevo" id="itinerario_nuevo" cols="30" rows="6" placeholder="Escriba aquí el itinerario..." required class="text-xl w-full p-3 border border-gray-300 rounded"></textarea>
                <div class="w-full flex justify-end">
                    <input class="text-lg md:text-xl lg:text-2xl bg-[#FFC060] text-black font-semibold px-12 py-4 rounded hover:bg-[#F9D193] cursor-pointer" type="submit" name="enviar_itinerario_nuevo" id="enviar_itinerario_nuevo" value="ENVIAR">
                </div>
            </form>
        </section>


        <div class="bg-[#8C52FF] h-4 max-w-full"></div>

        <section class="mt-8 mb-8 flex flex-col items-center gap-6">
            <h1 class="text-3xl md:text-4xl text-center font-bold mb-4">ITINERARIOS ACEPTADOS</h1>
            
            <div class="grid items-stretch grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($itinerarios_aceptados as $itinerario)
                    <div class="bg-white rounded-md p-4 flex flex-col h-full">
                        <form class="flex flex-col flex-1 h-full" action="{{ route('hermandad.confirmarEliminarItinerario') }}" method="post">
                            @csrf
                            <h4 class="text-2xl text-center">{{$itinerario->dia}}</h4>
                            <p>{{$itinerario->recorrido}}</p>
    
                            <input type="hidden" name="itinerario_eliminar" value="{{ $itinerario->id }}">

                            <div class="w-full flex justify-center mt-auto">
                                <input class="text-lg md:text-xl lg:text-2xl bg-[#FFC060] text-black font-semibold px-12 py-4 rounded hover:bg-[#F9D193] cursor-pointer" type="submit" value="ELIMINAR">
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>

            @if (count($itinerarios_aceptados) == 0)
                <div>
                    <p class="text-2xl text-center font-bold">No hay itinerarios aceptatos</p>
                </div>
            @endif
        </section>

        <div class="bg-[#8C52FF] h-4 max-w-full"></div>

        <section class="mt-8 mb-8 flex flex-col items-center gap-6">
            <h1 class="text-3xl md:text-4xl text-center font-bold">ITINERARIOS NO ACEPTADOS</h1>
            
            <div class="grid items-stretch grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($itinerarios_no_aceptados as $itinerario)
                    <div class="bg-white rounded-md p-4 flex flex-col h-full">
                        <form class="flex flex-col flex-1 h-full" action="{{ route('hermandad.confirmarEliminarItinerario') }}" method="post">
                            @csrf
                            <h4 class="text-2xl text-center">{{$itinerario->dia}}</h4>
                            <p>{{$itinerario->recorrido}}</p>

                            <input type="hidden" name="itinerario_eliminar" value="{{ $itinerario->id }}">

                            <div class="w-full flex justify-center mt-auto">
                                <input class="text-lg md:text-xl lg:text-2xl bg-[#FFC060] text-black font-semibold px-12 py-4 rounded hover:bg-[#F9D193] cursor-pointer" type="submit" value="ELIMINAR">
                            </div>
                        </form>
                    </div>

                @endforeach
            </div>

            @if (count($itinerarios_no_aceptados) == 0)
                <div>
                    <p class="text-2xl text-center font-bold">No hay itinerarios sin aceptar</p>
                </div>
            @endif
        </section>

        <div class="bg-[#8C52FF] h-4 max-w-full"></div>

        <section class="mt-8 mb-8 flex flex-col items-center gap-6" flex flex-col items-center gap-6>
            <h1 class="text-3xl md:text-4xl text-center font-bold">CONTRATA A LA BANDA</h1>
            
            <form class="grid grid-cols-2 gap-4 w-full" action="{{ route('hermandad.contratarBanda') }}" method="post">
                @csrf
                
                <select class="col-span-full px-3 py-2 border border-gray-300 md:text-xl rounded cursor-pointer" name="titular_banda" id="titular_banda" required>
                    <option class="font-bold" value="">--SELECCIONE EL TITULAR--</option>

                    @foreach ($titulares as $titular)
                        <option value="{{$titular->id}}">{{$titular->nombre_completo}}</option>
                    @endforeach
                </select>

                <select class="col-span-full lg:col-span-1 py-2 border border-gray-300 md:text-xl rounded cursor-pointer" name="formacion_banda" id="formacion_banda" required>
                    <option class="font-bold" value="">--SELECCIONE LA FORMACIÓN MUSICAL--</option>

                    @foreach ($formaciones as $formacion)
                        <option value="{{$formacion->id}}">{{$formacion->abreviatura}}</option>
                    @endforeach
                </select>

                <input class="col-span-full lg:col-span-1 py-2 border border-gray-300 text-xl rounded" type="text" name="banda" id="banda" placeholder="Escriba aquí el nombre de la banda...">

                <div class="col-span-full w-full flex justify-end">
                    <input class="w-full md:w-auto text-lg md:text-xl lg:text-2xl bg-[#FFC060] text-black font-semibold px-12 py-4 rounded hover:bg-[#F9D193] cursor-pointer" type="submit" name="enviar_banda" id="enviar_banda" value="ENVIAR">
                </div>
            </form>
        </section>

        <div class="bg-[#8C52FF] h-4 max-w-full"></div>

        <section class="mt-8 mb-8 flex flex-col items-center gap-6">
            <h1 class="text-3xl md:text-4xl text-center font-bold">ADMINISTRACIÓN DE HERMANOS</h1>
            <h3 class="text-3xl">{{ $hermandad->hermanos }} HERMANOS</h3>

            <div class="flex flex-col md:flex-row gap-4 justify-between items-center w-full max-w-full">
                <form class="flex justify-evenly gap-4" action="{{ route('hermandad.gestionHermanos') }}" method="post">
                    @csrf
                    <input class="px-3 py-2 border border-gray-300 text-xl rounded" type="number" name="cambio_hermanos" id="cambio_hermanos" min="1" placeholder="Nº de nuevos hermanos" required>
                    <input class="md:w-auto text-lg md:text-xl lg:text-2xl bg-[#FFC060] text-black font-semibold px-8 py-2 rounded hover:bg-[#F9D193] cursor-pointer" type="submit" name="enviar_nuevos_hermanos" id="enviar_nuevos_hermanos" value="ALTA">
                </form>
    
                <form class="flex justify-evenly gap-4" action="{{ route('hermandad.gestionHermanos') }}" method="post">
                    @csrf
                    <input class="px-3 py-2 border border-gray-300 text-xl rounded" type="number" name="cambio_hermanos" id="cambio_hermanos" min="1" placeholder="Nº de antiguos hermanos" required>
                    <input class="md:w-auto text-lg md:text-xl lg:text-2xl bg-[#FFC060] text-black font-semibold px-8 py-2 rounded hover:bg-[#F9D193] cursor-pointer" type="submit" name="enviar_antiguos_hermanos" id="enviar_antiguos_hermanos" value="BAJA">
                </form>
            </div>
        </section>

        <div class="bg-[#8C52FF] h-4 max-w-full"></div>

        <section class="mt-8 mb-8 flex flex-col items-center gap-6">
            <h1 class="text-3xl md:text-4xl text-center font-bold">ADMINISTRACIÓN DE LA CUOTA</h1>
            <h3 class="text-3xl">{{ $hermandad->cuota }}€</h3>

            <form class="flex justify-evenly items-center gap-4 w-full max-w-full" action="{{ route('hermandad.gestionCuota') }}" method="post">
                @csrf
                <input class="w-full max-w-full px-3 py-2 border border-gray-300 text-xl rounded" type="number" name="cuota" id="cuota" min="0" step="0.01" placeholder="Introduce la nueva cuota de hermano...">
                <input class="w-full max-w-full md:w-auto text-lg md:text-xl lg:text-2xl bg-[#FFC060] text-black font-semibold px-8 py-2 rounded hover:bg-[#F9D193] cursor-pointer" type="submit" name="enviar_cuota" id="enviar_cuota" value="MODIFICAR">
            </form>
        </section>

        <div class="bg-[#8C52FF] h-4 max-w-full"></div>

        <section class="mt-8 mb-8 flex flex-col items-center justify-center gap-6">
            <h1 class="text-3xl md:text-4xl text-center font-bold">IMÁGENES</h1>

            <div class="grid lg:grid-cols-2 gap-32">
                <form class="flex flex-col items-center justify-evenly gap-4 w-full max-w-full" action="{{ route('hermandad.cambiarFotos') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label class="text-center text-lg md:text-2xl" for="header">Imagen de cabecera</label>
                    
                    <figure class="w-[10rem]">
                        <img class="w-full" src="../img/{{ $hermandad->header }}" alt="Imagen de cabecera">
                    </figure>

                    <div class="flex items-center justify-center gap-4">
                        <input type="file" name="header" id="header" required>
                        <input type="hidden" name="header_antiguo" id="header_antiguo" value="{{ $hermandad->header }}">
                        <input class="text-lg md:text-xl lg:text-2xl bg-[#FFC060] text-black font-semibold px-12 py-4 rounded hover:bg-[#F9D193] cursor-pointer" type="submit" name="enviar_itinerario_nuevo" type="submit" name="enviar_header" id="enviar_header" value="ENVIAR">
                    </div>
                </form>

                @foreach ($titulares as $titular)    
                    <form class="flex flex-col items-center justify-evenly gap-4 w-full max-w-full" action="{{ route('hermandad.cambiarFotos') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label class="col-span-full md:text-xl" for="imagen_{{ $titular->id }}">Imagen de {{$titular->nombre_completo}}</label>
                        
                        <figure class="col-span-full w-[100px]">
                            <img class="w-full" src="../img/{{ $titular->imagen }}" alt="Imagen de {{$titular->nombre_completo}}">
                        </figure>

                        <div class="flex items-center justify-center gap-4">
                            <input type="file" name="imagen_{{ $titular->id }}" id="imagen_{{ $titular->id }}" required>
                            <input type="hidden" name="id_titular_imagen_antiguo" id="id_titular_imagen_antiguo" value="{{ $titular->id }}">
                            <input class="text-lg md:text-xl lg:text-2xl bg-[#FFC060] text-black font-semibold px-12 py-4 rounded hover:bg-[#F9D193] cursor-pointer" type="submit" name="enviar_itinerario_nuevo" type="submit" name="enviar_imagen_{{ $titular->id }}" id="enviar_imagen_{{ $titular->id }}" value="ENVIAR">
                        </div>
                    </form>
                @endforeach
            </div>
        </section>

        <div class="flex items-center justify-center pb-8">
            <a class="text-3xl md:text-4xl underline" href="{{ route('principal') }}">VOLVER ATRÁS</a>
        </div>
    </div>
    
</body>
</html>