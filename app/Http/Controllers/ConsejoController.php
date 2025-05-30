<?php

namespace App\Http\Controllers;

use App\Models\Cartele;
use App\Models\Consejo;
use App\Models\Hermandade;
use App\Models\Itinerario;
use App\Models\Pregone;
use Illuminate\Http\Request;

class ConsejoController extends Controller
{
    public function index(){
        $consejos = Consejo::all();
        $consejo = $consejos[0];

        return view('consejo.index', compact('consejo'));
    }

    public function carteles() {
        $carteles = Cartele::orderBy('anio', 'desc')->get();
        return view('consejo.carteles', compact('carteles'));
    }

    public function pregones() {
        $pregones = Pregone::orderBy('anio', 'desc')->get();
        return view('consejo.pregones', compact('pregones'));
    }

    public function itinerarios() {
        $itinerarios = [];
        $hermandades = [];

        $itinerarios[] = Itinerario::where('dia', 'Domingo de Ramos')->orderBy('hora_salida', 'asc')->get();
        $itinerarios[] = Itinerario::where('dia', 'Lunes Santo')->orderBy('hora_salida', 'asc')->get();
        $itinerarios[] = Itinerario::where('dia', 'Martes Santo')->orderBy('hora_salida', 'asc')->get();
        $itinerarios[] = Itinerario::where('dia', 'Miércoles Santo')->orderBy('hora_salida', 'asc')->get();
        $itinerarios[] = Itinerario::where('dia', 'Jueves Santo')->orderBy('hora_salida', 'asc')->get();
        $itinerarios[] = Itinerario::where('dia', 'Madrugá')->orderBy('hora_salida', 'asc')->get();
        $itinerarios[] = Itinerario::where('dia', 'Viernes Santo')->orderBy('hora_salida', 'asc')->get();
        $itinerarios[] = Itinerario::where('dia', 'Sábado Santo')->orderBy('hora_salida', 'asc')->get();
        $itinerarios[] = Itinerario::where('dia', 'Domingo de Resurrección')->orderBy('hora_salida', 'asc')->get();

        $hermandades = Hermandade::all();

        return view('consejo.itinerarios', compact('itinerarios', 'hermandades'));
    }

    public function show($itin) {
        $itinerario = Itinerario::findOrFail($itin);
        $hermandad = Hermandade::where('id', $itinerario->id_hermandad)->first();

        return view('consejo.show', compact('itinerario', 'hermandad'));
    }
}
