<?php

namespace App\Http\Controllers;

use App\Models\Hermandade;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function index(){
        $hermandades = Hermandade::all();

        return view('principal.index', compact('hermandades'));
    }
}

