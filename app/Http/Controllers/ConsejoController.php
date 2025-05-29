<?php

namespace App\Http\Controllers;

use App\Models\Cartele;
use App\Models\Consejo;
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

    public function itinerarios() {
        $itinerarios = [];
        $itinerarios[] = Itinerario::where('dia', 'Domingo de Ramos')->get();
        $itinerarios[] = Itinerario::where('dia', 'Lunes Santo')->get();
        $itinerarios[] = Itinerario::where('dia', 'Martes Santo')->get();
        $itinerarios[] = Itinerario::where('dia', 'Miércoles Santo')->get();
        $itinerarios[] = Itinerario::where('dia', 'Jueves Santo')->get();
        $itinerarios[] = Itinerario::where('dia', 'Madrugá')->get();
        $itinerarios[] = Itinerario::where('dia', 'Viernes Santo')->get();
        $itinerarios[] = Itinerario::where('dia', 'Sábado Santo')->get();
        $itinerarios[] = Itinerario::where('dia', 'Domingo de Resurrección')->get();

        return view('consejo.itinerarios', compact('itinerarios'));
    }

    public function pregones() {
        $pregones = Pregone::orderBy('anio', 'desc')->get();
        return view('consejo.pregones', compact('pregones'));
    }
}
