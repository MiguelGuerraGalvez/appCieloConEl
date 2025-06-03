<?php

namespace App\Http\Controllers;

use App\Models\Dia;
use App\Models\Formacione;
use App\Models\Hermandade;
use App\Models\Itinerario;
use App\Models\Titulare;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
}
