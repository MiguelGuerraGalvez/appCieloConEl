<?php

namespace App\Http\Controllers;

use App\Models\Hermandade;
use App\Models\Itinerario;
use App\Models\Titulare;
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
}
