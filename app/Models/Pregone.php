<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pregone extends Model
{
    use HasFactory;

    public static function eliminar($id) {
        $registro = parent::findOrFail($id);
        $registro->delete();
    }
}
