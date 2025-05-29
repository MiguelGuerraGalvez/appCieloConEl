<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VolverController extends Controller
{
    public function index(){
        return redirect()->route('principal');
    }
}
