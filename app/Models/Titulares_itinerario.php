<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Log;

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

    public static function eliminarPorTitular($id_titular) {
        $registros = parent::where('id_titular', $id_titular)->get();

        foreach ($registros as $registro) {
            $registro->delete();
        }
    }

    public static function eliminarPorItinerario($id_itinerario) {
        $registros = parent::where('id_itinerario', $id_itinerario)->get();
        Log::info($registros);

        foreach ($registros as $registro) {
            $registro->delete();
        }
    }
}
