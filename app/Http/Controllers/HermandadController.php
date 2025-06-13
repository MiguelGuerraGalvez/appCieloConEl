<?php

namespace App\Http\Controllers;

use App\Models\Dia;
use App\Models\Formacione;
use App\Models\Hermandade;
use App\Models\Itinerario;
use App\Models\Titulare;
use App\Models\Titulares_itinerario;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class HermandadController extends Controller
{
    public function show($hermandad){
        $hermandades = Hermandade::all();
        $titulares = Titulare::all();
        $itinerarios = Itinerario::all();
        $her = new Hermandade();
        $titul = [];
        $itin = [];

        foreach ($hermandades as $h) {
            if ($h->nombre == $hermandad) {
                $her = $h;
            }
        }
        
        foreach ($titulares as $t) {
            if ($t->id_hermandad == $her->id) {
                $titul[] = $t;
            }
        }

        foreach ($itinerarios as $itinerario) {
            if ($itinerario->id_hermandad == $her->id && $itinerario->aceptado == 1) {
                $itin[] = $itinerario;
            }
        }

        return view('hermandad.show', compact('hermandad', 'her', 'titul', 'itin'));
    }

    public function create($h){
        $usuario = Auth::user();
        $hermandad = Hermandade::where('id_usuario', $usuario->id)->first();
        $titulares = Titulare::where('id_hermandad', $hermandad->id)->get();
        $itinerarios_no_aceptados = Itinerario::where('id_hermandad', $hermandad->id)->where('aceptado', 0)->get();
        $itinerarios_aceptados = Itinerario::where('id_hermandad', $hermandad->id)->where('aceptado', 1)->get();
        $dias = Dia::all();
        $formaciones = Formacione::all();

        return view('hermandad.create', compact('hermandad', 'titulares', 'itinerarios_no_aceptados', 'itinerarios_aceptados', 'dias', 'formaciones'));
    }

    public function nuevoItinerario(REQUEST $request) {
        try{
            $hermandad = Hermandade::where('id_usuario', Auth::user()->id)->first();
            $id_dia = $request->input('dia_itinerario_nuevo');
            $dia = Dia::findOrFail($id_dia);
            $nazarenos = $request->input('nazarenos_itinerario_nuevo');
            $hora_salida = $request->input('hora_salida_itinerario_nuevo');
            $hora_salida = Carbon::createFromFormat('H:i', $hora_salida)->format('H:i:s');
            $imagen = $request->file('imagen_itinerario_nuevo');

            $nombreImagen = $imagen->getClientOriginalName();
            $imagen->move(public_path('img'), $nombreImagen);

            $itinerario = $request->input('itinerario_nuevo');
            
            Itinerario::insertar($hermandad->id, $dia->dia, $nazarenos, $hora_salida, $itinerario, $nombreImagen);
            
            $titulares = Titulare::where('id_hermandad', $hermandad->id)->get();
            $ultimo_itinerario = Itinerario::orderBy('created_at', 'desc')->first();


            foreach ($titulares as $titular) {
                if (!empty($_REQUEST['titular_'.$titular->id.'_itinerario_nuevo'])) {
                    Titulares_itinerario::insertar($titular->id, $ultimo_itinerario->id);
                }
            }

            return redirect()->route('hermandad.administracion', ['hermandad' => $hermandad->nombre])->with('success', 'Itinerario insertado correctamente.');
        } catch (\Exception $e) {
            Log::error('Error al insertar itinerario: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Ha ocurrido un error al insertar el itinerario.']);
        }
    }

    public function confirmarEliminarItinerario(REQUEST $request) {
        $itinerario = Itinerario::findOrFail($request->input('itinerario_eliminar'));

        return view('hermandad.confirmarEliminarItinerario', compact('itinerario'));
    }

    public function deleteItinerario(REQUEST $request) {
        try{
            $hermandad = Hermandade::where('id_usuario', Auth::user()->id)->first();
            $id_itinerario = $request->input('itinerario_eliminar');

            Itinerario::eliminar($id_itinerario);
            Titulares_itinerario::eliminarPorItinerario($id_itinerario);

            return redirect()->route('hermandad.administracion', ['hermandad' => $hermandad->nombre])->with('success', 'Itinerario borrado correctamente.');
        } catch (\Exception $e) {
            Log::error('Error al borrar itinerario: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Ha ocurrido un error al borrar el itinerario.']);
        }
    }

    public function contratarBanda(REQUEST $request) {
        try {
            $hermandad = Hermandade::where('id_usuario', Auth::user()->id)->first();
            $id_titular = $request->input('titular_banda');
            $id_formacion = $request->input('formacion_banda');
            $formacion = Formacione::findOrFail($id_formacion);
            $banda = $request->input('banda');

            DB::table('titulares')->where('id', $id_titular)->update(['banda' => $formacion->formacion." ".$banda]);

            return redirect()->route('hermandad.administracion', ['hermandad' => $hermandad->nombre]);
        } catch (\Exception $e) {
            Log::error('Error al contratar la banda: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Ha ocurrido un error al contratar la banda.']);
        }
    }

    public function gestionHermanos(REQUEST $request) {
        try {
            $hermandad = Hermandade::where('id_usuario', Auth::user()->id)->first();
            $cambio_hermanos = $request->input('cambio_hermanos');

            if ($request->has('enviar_nuevos_hermanos')) {
                $hermanos = $hermandad->hermanos + $cambio_hermanos;
            } else {
                $hermanos = $hermandad->hermanos - $cambio_hermanos;
            }

            DB::table('hermandades')->where('id', $hermandad->id)->update(['hermanos' => $hermanos]);

            return redirect()->route('hermandad.administracion', ['hermandad' => $hermandad->nombre]);
        } catch (\Exception $e) {
            Log::error('Error al gestionar los hermanos: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Ha ocurrido un error al gestionar los hermanos.']);
        }
    }

    public function gestionCuota(REQUEST $request) {
        try {
            $hermandad = Hermandade::where('id_usuario', Auth::user()->id)->first();
            $nueva_cuota = $request->input('cuota');

            DB::table('hermandades')->where('id', $hermandad->id)->update(['cuota' => $nueva_cuota]);

            return redirect()->route('hermandad.administracion', ['hermandad' => $hermandad->nombre]);
        } catch (\Exception $e) {
            Log::error('Error al gestionar la cuota: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Ha ocurrido un error al gestionar la cuota.']);
        }
    }

    public function cambiarFotos(REQUEST $request) {
        try {
            $hermandad = Hermandade::where('id_usuario', Auth::user()->id)->first();

            if ($request->has('enviar_header')) {
                $imagen = $request->file('header');

                if ($imagen) {
                    if (File::exists(public_path('img/' . $hermandad->header))) {
                        File::delete(public_path('img/' . $hermandad->header));
                    }
                }
                
                
                $nombreImagen = $imagen->getClientOriginalName();
                $extension = substr($nombreImagen, strrpos($nombreImagen, "."));

                $nombreSinEspacios = str_replace([' ', '!', '"', '#', '$', '%', '&', "'", '(', ')', '*', '+', ',', '/', ':', ';', '<', '=', '>', '?', '@', '[', '\\', ']', '^', '`', '{', '|', '}', '~'], '_', $hermandad->nombre);
                $nombreSinEspacios = str_replace(['á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú'], ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'], $nombreSinEspacios);
                $nombreImagenNuevo =  'Header_'.$nombreSinEspacios.''.$extension;
                $imagen->move(public_path('img'), $nombreImagenNuevo);
                
                DB::table('hermandades')->where('id', $hermandad->id)->update(['header' => $nombreImagenNuevo]);
            } else {
                $titular = Titulare::findOrFail($request->input('id_titular_imagen_antiguo'));
                $imagen = $request->file('imagen_' . $titular->id);

                if (File::exists(public_path('img/' . $titular->imagen))) {
                    File::delete(public_path('img/' . $titular->imagen));
                }

                $nombreImagen = $imagen->getClientOriginalName();
                $extension = substr($nombreImagen, strrpos($nombreImagen, "."));

                $nombreTitularSinEspacios = str_replace([' ', '!', '"', '#', '$', '%', '&', "'", '(', ')', '*', '+', ',', '/', ':', ';', '<', '=', '>', '?', '@', '[', '\\', ']', '^', '`', '{', '|', '}', '~'], '_', $titular->nombre_corto);
                $nombreTitularSinEspacios = str_replace(['á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú'], ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'], $nombreTitularSinEspacios);
                $nombreSinEspacios = str_replace([' ', '!', '"', '#', '$', '%', '&', "'", '(', ')', '*', '+', ',', '/', ':', ';', '<', '=', '>', '?', '@', '[', '\\', ']', '^', '`', '{', '|', '}', '~'], '_', $hermandad->nombre);
                $nombreSinEspacios = str_replace(['á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú'], ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'], $nombreSinEspacios);
                $nombreImagenNuevo =  'Header_'.$nombreSinEspacios.''.$extension;
                $nombreImagenNuevo =  'Carrusel_'.$nombreTitularSinEspacios.''.$nombreSinEspacios.''.$extension;
                $imagen->move(public_path('img'), $nombreImagenNuevo);

                DB::table('titulares')->where('id', $titular->id)->update(['imagen' => $nombreImagenNuevo]);
            }

            return redirect()->route('hermandad.administracion', ['hermandad' => $hermandad->nombre]);
        } catch (\Exception $e) {
            Log::error('Error al cambiar las fotos: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Ha ocurrido un error al cambiar las fotos.']);
        }
    }
}
