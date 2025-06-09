<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cartele extends Model
{
    use HasFactory;

    protected $fillable = ['id_consejo', 'imagen', 'anio', 'autor'];

    public static function eliminar($id) {
        $registro = parent::findOrFail($id);
        $registro->delete();
    }
}
