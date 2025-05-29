<?php

namespace Database\Seeders;

use App\Models\Cartele;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $c1 = new Cartele();

        $c1->id_consejo = 1;
        $c1->imagen = 'Cartel_2025.webp';
        $c1->anio = 2025;
        $c1->autor = 'Gonzalo Quesada Portillo';

        $c1->save();

        $c2 = new Cartele();

        $c2->id_consejo = 2;
        $c2->imagen = 'Cartel_2024.webp';
        $c2->anio = 2024;
        $c2->autor = 'Juan Sánchez Villores';

        $c2->save();

        $c3 = new Cartele();

        $c3->id_consejo = 1;
        $c3->imagen = 'Cartel_2023.webp';
        $c3->anio = 2023;
        $c3->autor = 'Beatriz Hurtado Molina';

        $c3->save();

        $c4 = new Cartele();

        $c4->id_consejo = 1;
        $c4->imagen = 'Cartel_2022.webp';
        $c4->anio = 2022;
        $c4->autor = 'David Gómez López';

        $c4->save();

        $c5 = new Cartele();

        $c5->id_consejo = 1;
        $c5->imagen = 'Cartel_2021.webp';
        $c5->anio = 2021;
        $c5->autor = 'José Antonio Sanmartín Ledesma';

        $c5->save();

        $c6 = new Cartele();

        $c6->id_consejo = 1;
        $c6->imagen = 'Cartel_2020.webp';
        $c6->anio = 2020;
        $c6->autor = 'Enrique Liria Cordero';

        $c6->save();

        $c7 = new Cartele();

        $c7->id_consejo = 1;
        $c7->imagen = 'Cartel_2019.webp';
        $c7->anio = 2019;
        $c7->autor = 'Juan Guerrero García';

        $c7->save();

        $c8 = new Cartele();

        $c8->id_consejo = 1;
        $c8->imagen = 'Cartel_2018.webp';
        $c8->anio = 2018;
        $c8->autor = 'Antonio Rodríguez Ledesma';

        $c8->save();
        
        $c9 = new Cartele();

        $c9->id_consejo = 1;
        $c9->imagen = 'Cartel_2017.webp';
        $c9->anio = 2017;
        $c9->autor = 'Juan Núñez Cienfuegos';

        $c9->save();

        // $c = new Cartele();

        // $c->id_consejo = 1;
        // $c->imagen = 'Cartel_.webp';
        // $c->anio = 20;
        // $c->autor = '';

        // $c->save();
    }
}
