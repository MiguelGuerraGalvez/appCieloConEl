<?php

namespace Database\Seeders;

use App\Models\Consejo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsejoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $c = new Consejo();

        $c->id_usuario = 0;
        $c->nombre = "Consejo de Hermandades";
        $c->nombre_completo = "Consejo de Hermandades y Cofradías de Utrera";
        $c->escudo = "Escudo_Consejo.png";

        $c->save();
    }
}
