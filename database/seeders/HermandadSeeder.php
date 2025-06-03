<?php

namespace Database\Seeders;

use App\Models\Hermandade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HermandadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $h1 = new Hermandade();

        $h1->id_usuario = 3;
        $h1->nombre = "Vera+Cruz";
        $h1->nombre_completo = "Muy Antigua Hdad. y Archicofradía de Nazarenos de la Santa Vera-Cruz, Ntro Padre Jesús Atado a la Columna, Purísima Inmaculada Concepción, San Sebastián, Santo Entierro del Stmo. Cristo Yacente, Ntra Sra. de los Dolores y en Soledad";
        $h1->escudo = "Escudo_VeraCruz.png";
        $h1->header = "HEADER_VERACRUZ.jpg";
        $h1->hermanos = 800;
        $h1->cuota = 35;

        $h1->save();

        $h2 = new Hermandade();

        $h2->id_usuario = 0;
        $h2->nombre = "Jesús Nazareno";
        $h2->nombre_completo = "Real e Ilustre Hermandad de Ntro Padre Jesús Nazareno, Sta Cruz de Jerusalén, Sagrada Oración de Ntro. Señor Jesucristo en el Huerto y Ntra. Sra de las Angustias";
        $h2->escudo = "Escudo_Jesus_Nazareno.png";
        $h2->header = "HEADER_.jpg";
        $h2->hermanos = 750;
        $h2->cuota = 30;

        $h2->save();

        $h3 = new Hermandade();

        $h3->id_usuario = 0;
        $h3->nombre = "Trinidad";
        $h3->nombre_completo = "Fervorosa, Ilustre y Antigua Hermandad del Rosario de la Santísima Trinidad y Cofradía de Nazarenos del Stmo. Cristo de los Afligidos, Ntro Padre Jesús en su Entrada en Jerusalén y Ntra Sra. de los Desamparados.";
        $h3->escudo = "Escudo_Trinidad.png";
        $h3->header = "HEADER_TRINIDAD.jpg";
        $h3->hermanos = 600;
        $h3->cuota = 30;

        $h3->save();

        $h4 = new Hermandade();

        $h4->id_usuario = 0;
        $h4->nombre = "Cautivo";
        $h4->nombre_completo = "Pontificia e Ilustre Hdad. Sacramental de la Inmaculada Concepción y Ánimas Benditas, y Cofradía de Nazarenos del Stmo. Cristo de Santiago, Ntro Padre Jesús Redentor Cautivo y Ntra Sra de las Lágrimas";
        $h4->escudo = "Escudo_Cautivo.png";
        $h4->header = "HEADER_CAUTIVO.jpg";
        $h4->hermanos = 750;
        $h4->cuota = 30;

        $h4->save();

        $h5 = new Hermandade();

        $h5->id_usuario = 0;
        $h5->nombre = "Muchachos de Consolación";
        $h5->nombre_completo = "Hermandad Obrera de Apostolado y Penitencia del Santísimo Cristo del Perdón y María Santísima de la Amargura";
        $h5->escudo = "Escudo_Muchachos.png";
        $h5->header = "HEADER_MUCHACHOS.jpg";
        $h5->hermanos = 700;
        $h5->cuota = 25;

        $h5->save();

        $h6 = new Hermandade();

        $h6->id_usuario = 0;
        $h6->nombre = "Gitanos";
        $h6->nombre_completo = "Real, Fervorosa e Ilustre Hdad. de Penitencia del Stmo. Cristo de la Buena Muerte, Ntra Sra. de la Esperanza, Ntra. Sra. del Rosario y Beato Ceferino, Mártir";
        $h6->escudo = "Escudo_Gitanos.png";
        $h6->header = "HEADER_GITANOS.jpg";
        $h6->hermanos = 650;
        $h6->cuota = 25;

        $h6->save();

        $h7 = new Hermandade();

        $h7->id_usuario = 0;
        $h7->nombre = "Aceituneros";
        $h7->nombre_completo = "Ilustre Hermandad de Ntro Padre Jesús Atado a la Columna, María Santísima de la Paz, y San Pedro Príncipe de los Apóstoles";
        $h7->escudo = "Escudo_Aceituneros.png";
        $h7->header = "HEADER_ACEITUNEROS.jpg";
        $h7->hermanos = 750;
        $h7->cuota = 25;

        $h7->save();

        $h8 = new Hermandade();

        $h8->id_usuario = 0;
        $h8->nombre = "Estudiantes";
        $h8->nombre_completo = "Hermandad Salesiana y Cofradía de Nazarenos del Stmo. Cristo del Amor y Ntra. Sra. de las Veredas, María Auxilio de los Cristianos y San Juan Bosco.";
        $h8->escudo = "Escudo_Estudiantes.png";
        $h8->header = "HEADER_ESTUDIANTES.jpg";
        $h8->hermanos = 600;
        $h8->cuota = 30;

        $h8->save();

        $h9 = new Hermandade();

        $h9->id_usuario = 0;
        $h9->nombre = "Quinta Angustia";
        $h9->nombre_completo = "Real e Ilustre Hdad. de Penitencia del Stmo. Cristo de la Caridad en su Sagrado Descendimiento, María Stma. de la Piedad en su Quinta Angustia, Ntra. Sra. de los Ángeles en su Soledad y Sta Ángela de la Cruz";
        $h9->escudo = "Escudo_Quinta_Angustia.png";
        $h9->header = "HEADER_QUINTA_ANGUSTIA.jpg";
        $h9->hermanos = 650;
        $h9->cuota = 25;

        $h9->save();

        $h10 = new Hermandade();

        $h10->id_usuario = 0;
        $h10->nombre = "Los Milagros";
        $h10->nombre_completo = "Hermandad de Penitencia y Cofradía de Nazarenos del Santo Crucifijo de los Milagros, María Santísima de la Concepción y San Miguel Arcángel";
        $h10->escudo = "Escudo_Los_Milagros.png";
        $h10->header = "HEADER_LOS_MILAGROS.jpg";
        $h10->hermanos = 300;
        $h10->cuota = 20;

        $h10->save();
    }
}
