<?php

namespace App\Http\Controllers;

use App\Models\Hermandade;
use App\Models\Titulare;
use Illuminate\Http\Request;

class HermandadController extends Controller
{
    public function show($hermandad){
        $hermandades = Hermandade::all();
        $titulares = Titulare::all();
        $her = new Hermandade();
        $titul = [];

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

        return view('hermandad.show', compact('hermandad', 'her', 'titul'));
    }
}
