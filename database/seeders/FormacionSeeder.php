<?php

namespace Database\Seeders;

use App\Models\Formacione;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $f1 = new Formacione();

        $f1->abreviatura = 'CCTT';
        $f1->formacion = 'Banda de Cornetas y Tambores ';

        $f1->save();

        $f2 = new Formacione();

        $f2->abreviatura = 'BM';
        $f2->formacion = 'Banda de Música ';

        $f2->save();

        $f3 = new Formacione();

        $f3->abreviatura = 'AM';
        $f3->formacion = 'Agrupación Musical ';

        $f3->save();

        $f4 = new Formacione();

        $f4->abreviatura = 'Silencio';
        $f4->formacion = 'Silencio';

        $f4->save();

        $f5 = new Formacione();

        $f5->abreviatura = 'Trío de Capilla';
        $f5->formacion = 'Trío de Capilla';

        $f5->save();

        $f6 = new Formacione();

        $f6->abreviatura = 'Grupo Vocal';
        $f6->formacion = 'Grupo Vocal ';
        $f6->save();
    }
}
