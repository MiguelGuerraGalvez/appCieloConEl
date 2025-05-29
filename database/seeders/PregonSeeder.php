<?php

namespace Database\Seeders;

use App\Models\Pregone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PregonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $p1 = new Pregone();

        $p1->id_consejo = 1;
        $p1->anio = 2025;
        $p1->pregonero = 'Telmo Sánchez Reina';

        $p1->save();

        $p2 = new Pregone();

        $p2->id_consejo = 1;
        $p2->anio = 2024;
        $p2->pregonero = 'Jesús María Mena García';

        $p2->save();

        $p3 = new Pregone();

        $p3->id_consejo = 1;
        $p3->anio = 2023;
        $p3->pregonero = 'José María Martín Corrochano';

        $p3->save();

        $p4 = new Pregone();

        $p4->id_consejo = 1;
        $p4->anio = 2022;
        $p4->pregonero = 'Joaquín Curado Moliní';

        $p4->save();

        $p5 = new Pregone();

        $p5->id_consejo = 1;
        $p5->anio = 2021;
        $p5->pregonero = 'Joaquín Curado Moliní';

        $p5->save();

        $p6 = new Pregone();

        $p6->id_consejo = 1;
        $p6->anio = 2020;
        $p6->pregonero = 'Joaquín Curado Moliní';

        $p6->save();

        $p7 = new Pregone();

        $p7->id_consejo = 1;
        $p7->anio = 2019;
        $p7->pregonero = 'Antonio Manuel Romero Triguero';

        $p7->save();

        $p8 = new Pregone();

        $p8->id_consejo = 1;
        $p8->anio = 2018;
        $p8->pregonero = 'Francisco Pérez Ropero';

        $p8->save();
    }
}
