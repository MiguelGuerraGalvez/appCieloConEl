<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsejoController extends Controller
{
    public function index(){
        return view('consejo.index');
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
