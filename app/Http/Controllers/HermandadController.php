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
        $hermandad = Hermandade::where('id_usuario', Auth::user()->id)->first();
        $id_dia = $request->input('dia_itinerario_nuevo');
        $dia = Dia::findOrFail($id_dia);
        $nazarenos = $request->input('nazarenos_itinerario_nuevo');
        $hora_salida = $request->input('hora_salida_itinerario_nuevo');
        $hora_salida = Carbon::createFromFormat('H:i', $hora_salida)->format('H:i:s');

        $itinerario = $request->input('itinerario_nuevo');
        
        Itinerario::insertar($hermandad->id, $dia->dia, $nazarenos, $hora_salida, $itinerario);
        
        // $titulares = Titulare::where('id_hermandad', $hermandad->id)->get();
        // $ultimo_itinerario = Itinerario::orderBy('created_at', 'desc')->first();


        // foreach ($titulares as $titular) {
        //     if (!empty($_REQUEST['titular_'.$titular->id.'_itinerario_nuevo'])) {
        //         Titulares_itinerario::insertar($titular->id, $ultimo_itinerario->id);
        //     }
        // }

        return redirect()->route('hermandad.administracion', ['hermandad' => $hermandad->nombre]);
    }

    public function eliminarItinerario(REQUEST $request) {
        $hermandad = Hermandade::where('id_usuario', Auth::user()->id)->first();
        $id_itinerario = $request->input('itinerario_eliminar');

        Itinerario::eliminar($id_itinerario);

        Log::info("Redirigiendo a hermandad.administracion con: ".$hermandad->nombre);
        return redirect()->route('hermandad.administracion', ['hermandad' => $hermandad->nombre]);
    }

    public function contratarBanda(REQUEST $request) {
        $hermandad = Hermandade::where('id_usuario', Auth::user()->id)->first();
        $id_titular = $request->input('titular_banda');
        $id_formacion = $request->input('formacion_banda');
        $formacion = Formacione::findOrFail($id_formacion);
        $banda = $request->input('banda');

        DB::table('titulares')->where('id', $id_titular)->update(['banda' => $formacion->formacion." ".$banda]);

        return redirect()->route('hermandad.administracion', ['hermandad' => $hermandad->nombre]);
    }

    public function gestionHermanos(REQUEST $request) {
        $hermandad = Hermandade::where('id_usuario', Auth::user()->id)->first();
        $cambio_hermanos = $request->input('cambio_hermanos');

        if ($request->has('enviar_nuevos_hermanos')) {
            $hermanos = $hermandad->hermanos + $cambio_hermanos;
        } else {
            $hermanos = $hermandad->hermanos - $cambio_hermanos;
        }

        DB::table('hermandades')->where('id', $hermandad->id)->update(['hermanos' => $hermanos]);

        return redirect()->route('hermandad.administracion', ['hermandad' => $hermandad->nombre]);
    }

    public function gestionCuota(REQUEST $request) {
        $hermandad = Hermandade::where('id_usuario', Auth::user()->id)->first();
        $nueva_cuota = $request->input('cuota');

        DB::table('hermandades')->where('id', $hermandad->id)->update(['cuota' => $nueva_cuota]);

        return redirect()->route('hermandad.administracion', ['hermandad' => $hermandad->nombre]);
    }
}
