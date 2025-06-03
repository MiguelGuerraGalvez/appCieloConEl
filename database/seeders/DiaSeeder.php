<?php

namespace Database\Seeders;

use App\Models\Dia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $d1 = new Dia();

        $d1->dia = 'Domingo de Ramos';

        $d1->save();

        $d2 = new Dia();

        $d2->dia = 'Lunes Santo';

        $d2->save();

        $d3 = new Dia();

        $d3->dia = 'Martes Santo';

        $d3->save();

        $d4 = new Dia();

        $d4->dia = 'Miércoles Santo';

        $d4->save();

        $d5 = new Dia();

        $d5->dia = 'Jueves Santo';

        $d5->save();

        $d6 = new Dia();

        $d6->dia = 'Viernes Santo';

        $d6->save();

        $d7 = new Dia();

        $d7->dia = 'Sábado Santo';

        $d7->save();

        $d8 = new Dia();

        $d8->dia = 'Domingo de Resurrección';

        $d8->save();
    }
}
