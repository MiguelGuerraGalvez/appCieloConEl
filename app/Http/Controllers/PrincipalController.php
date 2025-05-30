<?php

namespace App\Http\Controllers;

use App\Models\Consejo;
use App\Models\Hermandade;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function index(){
        $consejos = Consejo::all();
        $hermandades = Hermandade::all();

        return view('principal.index', compact('consejos', 'hermandades'));
    }

    public function buscar(Request $request){
        $busqueda = $request->get('buscar');

        if ($busqueda) {
            $hermandades = Hermandade::where('nombre', 'LIKE', "%$busqueda%")->get();
        } else {
            $hermandades = Hermandade::all();
        }

        $hermandades->each(function ($hermandad) {
            $hermandad->url = route('hermandad', ['hermandad' => $hermandad->nombre]);
        });

        return response()->json($hermandades);
    }
}

