<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HermandadController extends Controller
{
    public function show($hermandad){
        return view('hermandad.show', ['hermandad' => $hermandad]);
    }
}
