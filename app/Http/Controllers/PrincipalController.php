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
}

