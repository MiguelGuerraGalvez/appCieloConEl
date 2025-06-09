<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hermandade extends Model
{
    use HasFactory;
    
    public static function aceptar($id) {
        $registro = parent::findOrFail($id);
        $registro->aceptado = 1;
        $registro->save();
    }
}
