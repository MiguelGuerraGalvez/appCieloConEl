<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Itinerario extends Model
{
    use HasFactory;

    protected $fillable = ['id_hermandad', 'dia', 'nazarenos', 'hora_salida', 'recorrido', 'imagen', 'aceptado'];


    public static function insertar($id_hermandad, $dia, $nazarenos, $hora_salida, $recorrido, $imagen = '', $aceptado = 0) {
        return self::create([
            'id_hermandad' => $id_hermandad,
            'dia' => $dia,
            'nazarenos' => $nazarenos,
            'hora_salida' => $hora_salida,
            'recorrido' => $recorrido,
            'imagen' => $imagen,
            'aceptado' => $aceptado,
        ]);
    }

    public static function eliminar($id) {
        $registro = parent::findOrFail($id);
        $registro->delete();
    }

}
