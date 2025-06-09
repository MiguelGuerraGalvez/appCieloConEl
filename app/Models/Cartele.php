<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\File;

class Cartele extends Model
{
    use HasFactory;

    protected $fillable = ['id_consejo', 'imagen', 'anio', 'autor'];

    public static function eliminar($id) {
        $registro = parent::findOrFail($id);

        if (File::exists(public_path('img/' . $registro->imagen))) {
            File::delete(public_path('img/' . $registro->imagen));
        }

        $registro->delete();
    }
}
