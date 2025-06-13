<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\File;

class Titulare extends Model
{
    use HasFactory;

    protected $fillable = ['id_hermandad', 'nombre_completo', 'nombre_corto', 'banda', 'imagen'];

    public function itinerarios() {
        return $this->belongsToMany(Itinerario::class, 'titulares_itinerarios', 'id_titular', 'id_itinerario');
    }


    public static function eliminar($id) {
        $registro = parent::findOrFail($id);
        if (File::exists(public_path('img/' . $registro->imagen)) && $registro->imagen != 'Usuario_Default.png') {
            File::delete(public_path('img/' . $registro->imagen));
        }

        $registro->delete();
    }
}
