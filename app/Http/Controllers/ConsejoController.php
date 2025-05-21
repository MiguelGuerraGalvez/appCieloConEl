<?php

namespace App\Http\Controllers;

use App\Models\Consejo;
use Illuminate\Http\Request;

class ConsejoController extends Controller
{
    public function index(){
        $consejos = Consejo::all();
        $consejo = $consejos[0];

        return view('consejo.index', compact('consejo'));
    }

    public function carteles() {
        return view('consejo.carteles');
    }

    public function itinerarios() {
        return view('consejo.itinerarios');
    }

    public function pregones() {
        return view('consejo.pregones');
    }
}
