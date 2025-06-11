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
        try {
            $id_itinerario = $request->input('itinerario');

            Itinerario::where('id', $id_itinerario)->update(['aceptado' => 1]);

            Log::info("Redirigiendo a consejo.administracion.");
            return redirect()->route('consejo.administracion');
        } catch (\Exception $e) {
            Log::error('Error al aceptar el itinerario: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Ha ocurrido un error al aceptar el itinerario.']);
        }
    }

    public function declinarItinerario(REQUEST $request) {
        try {
            $id_itinerario = $request->input('itinerario');
            $itinerario = Itinerario::findOrFail($id_itinerario);

            if (File::exists(public_path('img/' . $itinerario->imagen))) {
                File::delete(public_path('img/' . $itinerario->imagen));
            }

            Itinerario::eliminar($id_itinerario);

            Log::info("Redirigiendo a consejo.administracion con: ");
            return redirect()->route('consejo.administracion');
        } catch (\Exception $e) {
            Log::error('Error al declinar el itinerario: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Ha ocurrido un error al declinar el itinerario.']);
        }
    }

    public function aceptarHermandad(REQUEST $request) {
        try {
            $id_hermandad = $request->input('hermandad');
            
            User::where('id', $id_hermandad)->update(['rol' => 'hermandad']);
            
            Log::info("Redirigiendo a consejo.administracion.");
            return redirect()->route('consejo.administracion');
        } catch (\Exception $e) {
            Log::error('Error al aceptar la hermandad: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Ha ocurrido un error al aceptar la hermandad.']);
        }
    }
    
    public function declinarHermandad(REQUEST $request) {
        try{
            $id_hermandad = $request->input('hermandad');

            User::eliminar($id_hermandad);

            Log::info("Redirigiendo a consejo.administracion.");
            return redirect()->route('consejo.administracion');
        } catch (\Exception $e) {
            Log::error('Error al declinar la hermandad: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Ha ocurrido un error al declinar la hermandad.']);
        }
    }
    
    public function deleteCarteles(REQUEST $request) {
        try{
            $id_cartel = $request->input('cartel');
            
            Cartele::eliminar($id_cartel);
            
            Log::info("Redirigiendo a consejo.administracion.");
            return redirect()->route('consejo.administracion')->with('success', 'Cartel borrado correctamente.');
        } catch (\Exception $e) {
            Log::error('Error al borrar cartel: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Ha ocurrido un error al borrar el cartel.']);
        }
    }

    public function confirmarEliminarCarteles(REQUEST $request) {
        $cartel = Cartele::findOrFail($request->input('cartel'));

        return view('consejo.confirmarEliminarCarteles', compact('cartel'));
    }

    public function modificarCarteles(REQUEST $request) {
        $cartel = Cartele::findOrFail($request->input('cartel'));

        return view('consejo.modificarCarteles', compact('cartel'));
    }

    public function updateCarteles(REQUEST $request) {
        try{
            $id_cartel = $request->input('modificar_cartel_id');
            $cartel = Cartele::findOrFail($id_cartel);
            $autor = $request->input('modificar_cartel_autor');
            $anio = $request->input('modificar_cartel_anio');

            if ($request->has('modificar_cartel_imagen') && $request->file('modificar_cartel_imagen')->isValid()) {
                $imagen = $request->file('modificar_cartel_imagen');
                
                if (File::exists(public_path('img/' . $cartel->imagen))) {
                    File::delete(public_path('img/' . $cartel->imagen));
                }
                
                $nombreImagen = $imagen->getClientOriginalName();
                $imagen->move(public_path('img'), $nombreImagen);
                
                Cartele::where('id', $id_cartel)->update(['imagen' => $nombreImagen, 'autor' => $autor, 'anio' => $anio]);
            } else {
                Cartele::where('id', $id_cartel)->update(['autor' => $autor, 'anio' => $anio]);
            }

            return redirect()->route('consejo.administracion')->with('success', 'Cartel modificado correctamente.');
        } catch (\Exception $e) {
            Log::error('Error al modificar cartel: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Ha ocurrido un error al modificar el cartel.']);
        }
    }

    public function insertarCarteles(REQUEST $request) {
        try{
            $id_consejo = $request->input('nuevo_cartel_id_consejo');
            $imagen = $request->file('nuevo_cartel_imagen');

            if (!$imagen || !$imagen->isValid()) {
                return redirect()->back()->withErrors(['imagen' => 'La imagen no es válida.']);
            }

            $nombreImagen = $imagen->getClientOriginalName();
            $imagen->move(public_path('img'), $nombreImagen);

            $autor = $request->input('nuevo_cartel_autor');
            $anio = $request->input('nuevo_cartel_anio');

            Cartele::insert(['id_consejo' => $id_consejo, 'imagen' => $nombreImagen, 'autor' => $autor, 'anio' => $anio]);

            return redirect()->route('consejo.administracion')->with('success', 'Cartel insertado correctamente.');
        } catch (\Exception $e) {
            Log::error('Error al insertar cartel: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Ha ocurrido un error al insertar el cartel.']);
        }
    }

    public function confirmarEliminarPregones(REQUEST $request) {
        $pregon = Pregone::findOrFail($request->input('pregon'));

        return view('consejo.confirmarEliminarPregones', compact('pregon'));
    }

    public function deletePregones(REQUEST $request) {
        try{
        $id_pregon = $request->input('pregon');

        Pregone::eliminar($id_pregon);

        Log::info("Redirigiendo a consejo.administracion.");
        return redirect()->route('consejo.administracion')->with('success', 'Pregon borrado correctamente.');
        } catch (\Exception $e) {
            Log::error('Error al borrar pregon: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Ha ocurrido un error al borrar el pregon.']);
        }
    }


    public function modificarPregones(REQUEST $request) {
        $pregon = Pregone::findOrFail($request->input('pregon'));

        return view('consejo.modificarPregones', compact('pregon'));
    }

    public function updatePregones(REQUEST $request) {
        try{
        $id_pregon = $request->input('modificar_pregon_id');
        $pregonero = $request->input('modificar_pregon_pregonero');
        $anio = $request->input('modificar_pregon_anio');

        Pregone::where('id', $id_pregon)->update(['pregonero' => $pregonero, 'anio' => $anio]);

        return redirect()->route('consejo.administracion')->with('success', 'Pregon modificado correctamente.');
        } catch (\Exception $e) {
            Log::error('Error al modificar pregon: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Ha ocurrido un error al modificar el pregon.']);
        }
    }

    public function insertarPregones(REQUEST $request) {
        try{
        $id_consejo = $request->input('nuevo_pregon_id_consejo');

        $pregonero = $request->input('nuevo_pregon_pregonero');
        $anio = $request->input('nuevo_pregon_anio');

        Pregone::insert(['id_consejo' => $id_consejo, 'pregonero' => $pregonero, 'anio' => $anio]);

        return redirect()->route('consejo.administracion')->with('success', 'Pregon insertado correctamente.');
        } catch (\Exception $e) {
            Log::error('Error al insertar cartel: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Ha ocurrido un error al insertar el pregon.']);
        }
    }
}
