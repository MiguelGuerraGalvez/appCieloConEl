<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\File;

class Hermandade extends Model
{
    use HasFactory;

    protected $fillable = ['id_usuario', 'nombre_completo', 'nombre', 'escudo', 'header', 'hermanos', 'cuota'];
    
    public static function aceptar($id) {
        $registro = parent::findOrFail($id);
        $registro->aceptado = 1;
        $registro->save();
    }

    public static function eliminar($id) {
        $registro = parent::findOrFail($id);
        if (File::exists(public_path('img/' . $registro->header))) {
            File::delete(public_path('img/' . $registro->header));
        }

        if (File::exists(public_path('img/' . $registro->escudo)) && $registro->escudo != 'Usuario_Default.png') {
            File::delete(public_path('img/' . $registro->escudo));
        }

        $registro->delete();
    }
}
