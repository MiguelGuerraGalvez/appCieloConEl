@vite('resources/css/app.css')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administración Consejo</title>
    <link rel="icon" type="image/png" href="{{ asset('img/LOGO.png') }}">
</head>
<body class="bg-[#EBEBEB] flex justify-center">
    <div class="w-[80vw] mt-8">
        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <section class="flex flex-col justify-center items-center gap-6">
            <h1 class="text-3xl md:text-4xl text-center font-bold">ADMINISTRACIÓN DE ITINERARIOS</h1>
            
            <div class="grid items-stretch grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @for ($i = 0; $i < count($itinerariosNoAceptados); $i++)
                    <article class="bg-white rounded-md p-4 flex flex-col h-full gap-2">
                        <h3 class="text-2xl md:text-3xl text-center">{{ $hermandadesItinerarios[$i]->nombre }}</h3>
                        <h4 class="text-2xl text-center">{{ $itinerariosNoAceptados[$i]->dia }}</h4>
                        <h5 class="md:text-xl">NAZARENOS</h5>
                        <p>{{ $itinerariosNoAceptados[$i]->nazarenos }}</p>
                        <h5 class="md:text-xl">ITINERARIO</h5>
                        <p>{{ $itinerariosNoAceptados[$i]->recorrido }}</p>

                        <div class="flex justify-between mt-2">
                            <form class="" action="{{ route('consejo.aceptarItinerario') }}" method="post">
                                @csrf
                                <input type="hidden" name="itinerario" id="itinerario" value="{{ $itinerariosNoAceptados[$i]->id }}">
                                <input class="text-lg md:text-xl lg:text-2xl bg-[#FFC060] text-black font-semibold px-4 py-2 rounded hover:bg-[#F9D193] cursor-pointer" type="submit" name="itinerario_aceptar" id="itinerario_aceptar" value="ACEPTAR">
                            </form>
    
                            <form action="{{ route('consejo.declinarItinerario') }}" method="post">
                                @csrf
                                <input type="hidden" name="itinerario" id="itinerario" value="{{ $itinerariosNoAceptados[$i]->id }}">
                                <input class="text-lg md:text-xl lg:text-2xl bg-[#FFC060] text-black font-semibold px-4 py-2 rounded hover:bg-[#F9D193] cursor-pointer" type="submit" name="itinerario_declinar" id="itinerario_declinar" value="DECLINAR">
                            </form>
                        </div>
                    </article>
                @endfor
            </div>

            @if (count($itinerariosNoAceptados) == 0)
                <div>
                    <p class="text-2xl text-center font-bold">No hay itinerarios sin aceptar</p>
                </div>
            @endif
        </section>

        <div class="bg-[#8C52FF] h-4 max-w-full"></div>

        <section class="mt-8 mb-8 flex flex-col justify-center items-center gap-6">
            <h1 class="text-3xl md:text-4xl text-center font-bold">ADMINISTRACIÓN DE NUEVAS HERMANDADES</h2>

            <div class="grid items-stretch grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @for ($i = 0; $i < count($nuevasHermandades); $i++)
                    <article class="bg-white rounded-md p-4 flex flex-col items-center h-full gap-2">
                        <h2 class="text-2xl md:text-3xl text-center">{{ $nuevasHermandades[$i]->nombre }}</h3>
                        <h3 class="text-xl md:text-2xl text-center">{{ $nuevasHermandades[$i]->nombre_completo }}</h4>

                        <figure class="flex flex-col items-center w-[10rem]">
                            <img class="max-w-full h-auto" src="../img/{{ $nuevasHermandades[$i]->escudo }}" alt="Escudo Hermandad Nueva {{ $nuevasHermandades[$i]->nombre }}">
                        </figure>

                        <div class="w-full">
                            <h3 class="text-xl md:text-2xl">Titulares</h3>
                            @foreach ($nuevosTitulares[$i] as $titular)
                                <p>{{$titular->nombre_completo}}</p>
                            @endforeach
                        </div>

                        <div class="flex justify-between mt-2 w-full">
                            <form action="{{ route('consejo.aceptarHermandad') }}" method="post">
                                @csrf
                                <input type="hidden" name="hermandad" id="hermandad" value="{{ $nuevasHermandades[$i]->id }}">
                                <input class="text-lg md:text-xl lg:text-2xl bg-[#FFC060] text-black font-semibold px-4 py-2 rounded hover:bg-[#F9D193] cursor-pointer" type="submit" name="hermandad_aceptar" id="hermandad_aceptar" value="ACEPTAR">
                            </form>

                            <form action="{{ route('consejo.declinarHermandad') }}" method="post">
                                @csrf
                                <input type="hidden" name="hermandad" id="hermandad" value="{{ $nuevasHermandades[$i]->id }}">
                                <input class="text-lg md:text-xl lg:text-2xl bg-[#FFC060] text-black font-semibold px-4 py-2 rounded hover:bg-[#F9D193] cursor-pointer" type="submit" name="hermandad_declinar" id="hermandad_declinar" value="DECLINAR">
                            </form>
                        </div>
                    </article>
                @endfor
            </div>

            @if (count($nuevasHermandades) == 0)
                <div>
                    <p class="text-2xl text-center font-bold">No hay nuevas hermandades</p>
                </div>
            @endif
        </section>

        <div class="bg-[#8C52FF] h-4 max-w-full"></div>

        <section class="mt-8 mb-8 flex flex-col justify-center items-center gap-6">
            <h1 class="text-3xl md:text-4xl text-center font-bold">ADMINISTRACIÓN DE CARTELES</h1>

            <table class="dark:text-gray-400 bg-[#DFDFDF] border-2 border-black text-center w-full">
                <tr class="md:text-lg lg:text-xl">
                    <th class="border-2 border-black p-2">AÑO</th>
                    <th class="border-2 border-black p-2">AUTOR</th>
                    <th class="border-2 border-black p-2" colspan="2">ACCIONES</th>
                </tr>
                
                @foreach ($carteles as $cartel)
                    <tr class="md:text-lg lg:text-xl">
                        <td class="border-2 border-black p-2">{{ $cartel->anio }}</td>
                        <td class="border-2 border-black p-2">{{ $cartel->autor }}</td>
                        <td class="border-2 border-black">
                            <form action="{{ route('consejo.modificarCarteles') }}" method="post">
                                @csrf
                                <input type="hidden" name="cartel" id="cartel" value="{{ $cartel->id }}">
                                <input class="mt-4 text-lg md:text-xl lg:text-2xl bg-[#FFC060] text-black font-semibold px-4 py-2 rounded hover:bg-[#F9D193] cursor-pointer" type="submit" name="cartel_modificar" id="cartel_modificar" value="MODIFICAR">
                            </form>
                        </td>

                        <td class="border-2 border-black">
                            <form action="{{ route('consejo.confirmarEliminarCarteles') }}" method="post">
                                @csrf
                                <input type="hidden" name="cartel" id="cartel" value="{{ $cartel->id }}">
                                <input class="mt-4 text-lg md:text-xl lg:text-2xl bg-[#FFC060] text-black font-semibold px-4 py-2 rounded hover:bg-[#F9D193] cursor-pointer" type="submit" name="cartel_eliminar" id="cartel_eliminar" value="ELIMINAR">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            <div class="w-full max-w-full">
                <form class="grid lg:grid-cols-2 gap-4 w-full max-w-full" action="{{ route('consejo.insertarCarteles') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="nuevo_cartel_id_consejo" id="nuevo_cartel_id_consejo" value="{{ Auth::user()->id }}">
                    
                    <div class="col-span-full flex gap-4 justify-center items-center">
                        <label class="md:text-xl" for="nuevo_cartel_imagen">Imagen del cartel</label>
                        <input class="py-2 border-none md:text-xl rounded" type="file" name="nuevo_cartel_imagen" id="nuevo_cartel_imagen">
                    </div>

                    <input class="py-2 border border-gray-300 md:text-xl rounded" type="text" name="nuevo_cartel_autor" id="nuevo_cartel_autor" placeholder="Escriba aquí el autor...">
                    <input class="py-2 border border-gray-300 md:text-xl rounded" type="number" min="0" name="nuevo_cartel_anio" id="nuevo_cartel_anio" placeholder="Escriba aquí el año...">
                    <div class="col-span-full flex justify-center">
                        <input class="max-w-full w-full md:w-1/2 lg:w-1/4 text-lg md:text-xl lg:text-2xl bg-[#FFC060] text-black font-semibold px-4 py-2 rounded hover:bg-[#F9D193] cursor-pointer" type="submit" name="cartel_modificar" type="submit" name="nuevo_pregon_insertar" id="nuevo_pregon_insertar" value="INSERTAR">
                    </div>
                </form>
            </div>
        </section>

        <div class="bg-[#8C52FF] h-4 max-w-full"></div>

        <section class="mt-8 mb-8 flex flex-col justify-center items-center gap-6">
            <h1 class="text-3xl md:text-4xl text-center font-bold">ADMINISTRACIÓN DE PREGONES</h1>

            <table class="dark:text-gray-400 bg-[#DFDFDF] border-2 border-black text-center w-full">
                <tr class="md:text-lg lg:text-xl">
                    <th class="border-2 border-black p-2">AÑO</th>
                    <th class="border-2 border-black p-2">PREGONERO</th>
                    <th class="border-2 border-black p-2" colspan="2">ACCIONES</th>
                </tr>
                
                @foreach ($pregones as $pregon)
                    <tr class="md:text-lg lg:text-xl">
                        <td class="border-2 border-black p-2">{{ $pregon->anio }}</td>
                        <td class="border-2 border-black p-2">{{ $pregon->pregonero }}</td>
                        <td class="border-2 border-black">
                            <form action="{{ route('consejo.modificarPregones') }}" method="post">
                                @csrf
                                <input type="hidden" name="pregon" id="pregon" value="{{ $pregon->id }}">
                                <input class="mt-4 text-lg md:text-xl lg:text-2xl bg-[#FFC060] text-black font-semibold px-4 py-2 rounded hover:bg-[#F9D193] cursor-pointer" type="submit" name="pregon_modificar" id="pregon_modificar" value="MODIFICAR">
                            </form>
                        </td>

                        <td class="border-2 border-black">
                            <form action="{{ route('consejo.confirmarEliminarPregones') }}" method="post">
                                @csrf
                                <input type="hidden" name="pregon" id="pregon" value="{{ $pregon->id }}">
                                <input class="mt-4 text-lg md:text-xl lg:text-2xl bg-[#FFC060] text-black font-semibold px-4 py-2 rounded hover:bg-[#F9D193] cursor-pointer" type="submit" name="pregon_eliminar" id="pregon_eliminar" value="ELIMINAR">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            <div class="w-full max-w-full">
                <form class="grid lg:grid-cols-2 gap-4 w-full max-w-full" action="{{ route('consejo.insertarPregones') }}" method="post">
                    @csrf
                    <input type="hidden" name="nuevo_pregon_id_consejo" id="nuevo_pregon_id_consejo" value="{{ Auth::user()->id }}">
                    <input class="py-2 border border-gray-300 md:text-xl rounded" type="text" name="nuevo_pregon_pregonero" id="nuevo_pregon_pregonero" placeholder="Escriba aquí el pregonero...">
                    <input class="py-2 border border-gray-300 md:text-xl rounded" type="number" name="nuevo_pregon_anio" id="nuevo_pregon_anio" placeholder="Escriba aquí el año...">
                    <div class="col-span-full flex justify-center">
                        <input class="max-w-full w-full md:w-1/2 lg:w-1/4 text-lg md:text-xl lg:text-2xl bg-[#FFC060] text-black font-semibold px-4 py-2 rounded hover:bg-[#F9D193] cursor-pointer" type="submit" name="cartel_modificar" type="submit" name="nuevo_pregon_insertar" id="nuevo_pregon_insertar" value="INSERTAR">
                    </div>
                </form>
            </div>
        </section>

        <div class="flex items-center justify-center pb-8">
            <a class="text-3xl md:text-4xl underline" href="{{ route('principal') }}">VOLVER ATRÁS</a>
        </div>
    </div>
</body>
</html>