<?php

namespace Database\Seeders;

use App\Models\Titulares_itinerario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TitularesItinerariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ts1 = new Titulares_itinerario();

        $ts1->id_titular = 1;
        $ts1->id_itinerario = 1;

        $ts1->save();

        $ts2 = new Titulares_itinerario();

        $ts2->id_titular = 2;
        $ts2->id_itinerario = 2;

        $ts2->save();

        $ts3 = new Titulares_itinerario();

        $ts3->id_titular = 3;
        $ts3->id_itinerario = 1;

        $ts3->save();

        $ts4 = new Titulares_itinerario();

        $ts4->id_titular = 3;
        $ts4->id_itinerario = 2;

        $ts4->save();

        $ts5 = new Titulares_itinerario();

        $ts5->id_titular = 4;
        $ts5->id_itinerario = 3;

        $ts5->save();

        $ts6 = new Titulares_itinerario();

        $ts6->id_titular = 5;
        $ts6->id_itinerario = 4;

        $ts6->save();

        $ts7 = new Titulares_itinerario();

        $ts7->id_titular = 6;
        $ts7->id_itinerario = 4;

        $ts7->save();

        $ts8 = new Titulares_itinerario();

        $ts8->id_titular = 7;
        $ts8->id_itinerario = 5;

        $ts8->save();

        $ts9 = new Titulares_itinerario();

        $ts9->id_titular = 8;
        $ts9->id_itinerario = 6;

        $ts9->save();

        $ts10 = new Titulares_itinerario();

        $ts10->id_titular = 9;
        $ts10->id_itinerario = 6;

        $ts10->save();

        $ts11 = new Titulares_itinerario();

        $ts11->id_titular = 10;
        $ts11->id_itinerario = 7;

        $ts11->save();

        $ts12 = new Titulares_itinerario();

        $ts12->id_titular = 11;
        $ts12->id_itinerario = 7;

        $ts12->save();

        $ts13 = new Titulares_itinerario();

        $ts13->id_titular = 12;
        $ts13->id_itinerario = 8;

        $ts13->save();

        $ts14 = new Titulares_itinerario();

        $ts14->id_titular = 13;
        $ts14->id_itinerario = 8;

        $ts14->save();

        $ts15 = new Titulares_itinerario();

        $ts15->id_titular = 14;
        $ts15->id_itinerario = 9;

        $ts15->save();

        $ts16 = new Titulares_itinerario();

        $ts16->id_titular = 15;
        $ts16->id_itinerario = 9;

        $ts16->save();

        $ts17 = new Titulares_itinerario();

        $ts17->id_titular = 16;
        $ts17->id_itinerario = 10;

        $ts17->save();

        $ts18 = new Titulares_itinerario();

        $ts18->id_titular = 17;
        $ts18->id_itinerario = 10;

        $ts18->save();

        $ts19 = new Titulares_itinerario();

        $ts19->id_titular = 18;
        $ts19->id_itinerario = 11;

        $ts19->save();

        $ts20 = new Titulares_itinerario();

        $ts20->id_titular = 19;
        $ts20->id_itinerario = 11;

        $ts20->save();
        
        $ts21 = new Titulares_itinerario();

        $ts21->id_titular = 20;
        $ts21->id_itinerario = 12;

        $ts21->save();

        $ts22 = new Titulares_itinerario();

        $ts22->id_titular = 21;
        $ts22->id_itinerario = 12;

        $ts22->save();

        $ts23 = new Titulares_itinerario();

        $ts23->id_titular = 22;
        $ts23->id_itinerario = 13;

        $ts23->save();

        $ts24 = new Titulares_itinerario();

        $ts24->id_titular = 23;
        $ts24->id_itinerario = 13;

        $ts24->save();
    }
}
