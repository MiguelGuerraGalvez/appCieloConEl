<?php

namespace App\Http\Controllers;

use App\Models\Cartele;
use App\Models\Consejo;
use App\Models\Hermandade;
use App\Models\Itinerario;
use App\Models\Pregone;
use App\Models\Titulare;
use App\Models\Titulares_itinerario;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

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

    public function titulares($itinerario) {
        $titulares_itinerario = Titulares_itinerario::where('id_itinerario', $itinerario)->get();
        $titulares = [];
        foreach ($titulares_itinerario as $ts) {
            $titulares [] = Titulare::where('id', $ts->id_titular)->first();
        }

        return $titulares;
    }

    public function show($itin) {
        $itinerario = Itinerario::findOrFail($itin);
        $hermandad = Hermandade::where('id', $itinerario->id_hermandad)->first();
        $titulares_itinerario = Titulares_itinerario::where('id_itinerario', $itin)->get();
        $titulares = [];
        foreach ($titulares_itinerario as $ts) {
            $titulares [] = Titulare::where('id', $ts->id_titular)->first();
        }

        return view('consejo.show', compact('itinerario', 'hermandad', 'titulares'));
    }

    public function create(){
        $usuario = Auth::user();
        $itinerariosNoAceptados = Itinerario::where('aceptado', 0)->get();
        $usuariosNuevaHermandad = User::where('rol', 'nuevaHermandad')->get();
        $nuevasHermandades = [];

        foreach ($usuariosNuevaHermandad as $usuario) {
            $nuevasHermandades [] = Hermandade::where('id_usuario', $usuario->id)->get();
        }
        
        $carteles = Cartele::all();
        $pregones = Pregone::all();
        
        return view('consejo.create', compact('itinerariosNoAceptados', 'nuevasHermandades', 'carteles', 'pregones'));
    }

    public function aceptarItinerario(REQUEST $request) {
        $id_itinerario = $request->input('itinerario');

        Itinerario::where('id', $id_itinerario)->update(['aceptado' => 1]);

        Log::info("Redirigiendo a consejo.administracion.");
        return redirect()->route('consejo.administracion');
    }

    public function declinarItinerario(REQUEST $request) {
        $id_itinerario = $request->input('itinerario');
        $itinerario = Itinerario::findOrFail($id_itinerario);

        if (File::exists(public_path('img/' . $itinerario->imagen))) {
            File::delete(public_path('img/' . $itinerario->imagen));
        }

        Itinerario::eliminar($id_itinerario);

        Log::info("Redirigiendo a consejo.administracion con: ");
        return redirect()->route('consejo.administracion');
    }

    public function aceptarHermandad(REQUEST $request) {
        $id_hermandad = $request->input('hermandad');

        User::where('id', $id_hermandad)->update(['rol' => 'hermandad']);

        Log::info("Redirigiendo a consejo.administracion.");
        return redirect()->route('consejo.administracion');
    }

    public function declinarHermandad(REQUEST $request) {
        $id_hermandad = $request->input('hermandad');

        User::eliminar($id_hermandad);

        Log::info("Redirigiendo a consejo.administracion.");
        return redirect()->route('consejo.administracion');
    }

    public function eliminarCarteles(REQUEST $request) {
        $id_cartel = $request->input('cartel');

        Cartele::eliminar($id_cartel);

        Log::info("Redirigiendo a consejo.administracion.");
        return redirect()->route('consejo.administracion');
    }

    public function eliminarPregoneros(REQUEST $request) {
        $id_pregon = $request->input('pregon');

        Pregone::eliminar($id_pregon);

        Log::info("Redirigiendo a consejo.administracion.");
        return redirect()->route('consejo.administracion');
    }
}
