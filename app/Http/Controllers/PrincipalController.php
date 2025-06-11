<?php

namespace App\Http\Controllers;

use App\Models\Consejo;
use App\Models\Hermandade;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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

    public function modificarUsuario(REQUEST $request) {
        $usuario = User::findOrFail(Auth::user()->id);

        return view('principal.modificarUsuario', compact('usuario'));
    }
    
    public function updateUsuario(REQUEST $request) {
        $id_usuario = $request->input('modificar_usuario_id');
        $usuario = User::findOrFail($id_usuario);
        $nombre_usuario = $request->input('modificar_usuario_nombre');


        if ($request->has('modificar_usuario_icono') && $request->file('modificar_usuario_icono')->isValid()) {
            $icono = $request->file('modificar_usuario_icono');
            
            if (File::exists(public_path('img/' . $usuario->icon)) && $usuario->icon != 'Usuario_Default.png') {
                File::delete(public_path('img/' . $usuario->icon));
            }
            
            $nombreIcono = $icono->getClientOriginalName();
            $extension = substr($nombreIcono, strrpos($nombreIcono, "."));

            $iconoSinEspacios = str_replace([' ', '!', '"', '#', '$', '%', '&', "'", '(', ')', '*', '+', ',', '/', ':', ';', '<', '=', '>', '?', '@', '[', '\\', ']', '^', '`', '{', '|', '}', '~'], '_', $usuario->name);
            $iconoSinEspacios = str_replace(['á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú'], ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'], $iconoSinEspacios);
            $nombreIconoNuevo =  'Carrusel_'.$iconoSinEspacios.''.$extension;
            $icono->move(public_path('img'), $nombreIconoNuevo);
            
            User::where('id', $id_usuario)->update(['icon' => $nombreIconoNuevo, 'name' => $nombre_usuario]);
        } else {
            User::where('id', $id_usuario)->update(['name' => $nombre_usuario]);
        }

        return redirect()->route('principal');
    }
}

