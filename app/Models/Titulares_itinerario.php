<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Titulares_itinerario extends Model
{
    use HasFactory;

    protected $fillable = ['id_titular', 'id_itinerario'];

    public static function insertar($id_titular, $id_itinerario) {
        self::create([
            'id_titular' => $id_titular,
            'id_itinerario' => $id_itinerario,
        ]);
    }
}
