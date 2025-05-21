<?php

namespace App\Http\Controllers;

use App\Models\Hermandade;
use Illuminate\Http\Request;

class HermandadController extends Controller
{
    public function show($hermandad){
        $hermandades = Hermandade::all();
        
        foreach ($hermandades as $h) {
            if ($h->nombre == $hermandad) {
                $her = $h;
            }
        }
        
        return view('hermandad.show', compact('hermandad', 'her'));
    }
}
