<?php

namespace Database\Seeders;

use App\Models\Titulare;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TitularSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $t1 = new Titulare();
        
        $t1->id_hermandad = 1;
        $t1->nombre_completo = 'Nuestro Padre Jesús Atado a la Columna';
        $t1->nombre_corto = 'Atado a la Columna';
        $t1->banda = 'Banda de Cornetas y Tambores Vera Cruz de Utrera';
        $t1->imagen = 'Carrusel_Atado.jpg';
        
        $t1->save();
        
        $t2 = new Titulare();
        
        $t2->id_hermandad = 1;
        $t2->nombre_completo = 'Santísimo Cristo Yacente';
        $t2->nombre_corto = 'Yacente';
        $t2->banda = 'Trío de Capilla';
        $t2->imagen = 'Carrusel_Yacente.jpg';
        
        $t2->save();
        
        $t3 = new Titulare();

        $t3->id_hermandad = 1;
        $t3->nombre_completo = 'Nuestra Señora de los Dolores y en Soledad';
        $t3->nombre_corto = 'Virgen de los Dolores';
        $t3->banda = 'Asociación Musical de La Algaba';
        $t3->imagen = 'Carrusel_Dolores.jpg';
        
        $t3->save();
        
        $t4 = new Titulare();

        $t4->id_hermandad = 2;
        $t4->nombre_completo = 'Sagrada Oración de Nuestro Señor Jesucristo en el Huerto';
        $t4->nombre_corto = 'Oración en el Huerto';
        $t4->banda = 'Agrupación Musical Muchachos de Consolación de Utrera';
        $t4->imagen = 'Carrusel_Oracion.jpg';
        
        $t4->save();

        $t5 = new Titulare();

        $t5->id_hermandad = 2;
        $t5->nombre_completo = 'Nuestro Padre Jesús Nazareno';
        $t5->nombre_corto = 'Jesús Nazareno';
        $t5->banda = 'Agrupación Musical Muchachos de Consolación de Utrera';
        $t5->imagen = 'Carrusel_Jesus.jpg';
        
        $t5->save();

        $t6 = new Titulare();

        $t6->id_hermandad = 2;
        $t6->nombre_completo = 'Nuestra Señora de las Angustias';
        $t6->nombre_corto = 'Virgen de las Angustias';
        $t6->banda = 'Banda de Música Nuestra Señora de las Angustias de Sanlúcar la Mayor';
        $t6->imagen = 'Carrusel_Angustias.jpg';
        
        $t6->save();

        $t7 = new Titulare();

        $t7->id_hermandad = 3;
        $t7->nombre_completo = 'Nuestro Padre Jesús en su Entrada Triunfal en Jerusalén';
        $t7->nombre_corto = 'Borriquita';
        $t7->banda = 'Banda de Cornetas y Tambores Presentación al Pueblo de Dos Hermanas';
        $t7->imagen = 'Carrusel_Borriquita.jpg';
        
        $t7->save();

        $t8 = new Titulare();

        $t8->id_hermandad = 3;
        $t8->nombre_completo = 'Santísimo Cristo de los Afligidos';
        $t8->nombre_corto = 'Cristo de los Afligidos';
        $t8->banda = 'Agrupación Musical La Expiración de Salamanca';
        $t8->imagen = 'Carrusel_Afligidos.jpg';
        
        $t8->save();

        $t9 = new Titulare();

        $t9->id_hermandad = 3;
        $t9->nombre_completo = 'Nuestra Señora de los Desamparados';
        $t9->nombre_corto = 'Virgen de los Desamparados';
        $t9->banda = 'Banda de Música Liceo de Sevilla';
        $t9->imagen = 'Carrusel_Desamparados.jpg';
        
        $t9->save();

        $t10 = new Titulare();

        $t10->id_hermandad = 4;
        $t10->nombre_completo = 'Nuestro Padre Jesús Redentor Cautivo';
        $t10->nombre_corto = 'Cautivo';
        $t10->banda = 'Silencio';
        $t10->imagen = 'Carrusel_Cautivo.jpg';
        
        $t10->save();

        $t11 = new Titulare();

        $t11->id_hermandad = 4;
        $t11->nombre_completo = 'Nuestra Señora de las Lágrimas';
        $t11->nombre_corto = 'Virgen de las Lágrimas';
        $t11->banda = 'Silencio';
        $t11->imagen = 'Carrusel_Lagrimas.jpg';
        
        $t11->save();

        $t12 = new Titulare();

        $t12->id_hermandad = 5;
        $t12->nombre_completo = 'Santísimo Cristo del Perdón';
        $t12->nombre_corto = 'Cristo del Perdón';
        $t12->banda = 'Agrupación Musical Muchachos de Consolación de Utrera';
        $t12->imagen = 'Carrusel_Perdon.jpg';
        
        $t12->save();

        $t13 = new Titulare();

        $t13->id_hermandad = 5;
        $t13->nombre_completo = 'María Santísima de la Amargura';
        $t13->nombre_corto = 'Virgen de la Amargura';
        $t13->banda = 'Banda Municipal de Coria del Río';
        $t13->imagen = 'Carrusel_Amargura.jpg';
        
        $t13->save();

        $t14 = new Titulare();

        $t14->id_hermandad = 6;
        $t14->nombre_completo = 'Santísimo Cristo de la Buena Muerte';
        $t14->nombre_corto = 'Cristo de la Buena Muerte';
        $t14->banda = 'Banda de Cornetas y Tambores Vera Cruz de Utrera';
        $t14->imagen = 'Carrusel_Buena_Muerte.jpg';
        
        $t14->save();

        $t15 = new Titulare();

        $t15->id_hermandad = 6;
        $t15->nombre_completo = 'Nuestra Señora de la Esperanza';
        $t15->nombre_corto = 'Virgen de la Esperanza';
        $t15->banda = 'Banda de Música Maestro Leyva de Churriana de la Vega';
        $t15->imagen = 'Carrusel_Esperanza.jpg';
        
        $t15->save();

        $t16 = new Titulare();

        $t16->id_hermandad = 7;
        $t16->nombre_completo = 'Nuestro Padre Jesús Atado a la Columna';
        $t16->nombre_corto = 'Atado a la Columna';
        $t16->banda = 'Banda de Cornetas y Tambores Santísimo Cristo de los Remedios de Castilleja de la Cuesta';
        $t16->imagen = 'Carrusel_Atado_Aceituneros.jpg';
        
        $t16->save();

        $t17 = new Titulare();

        $t17->id_hermandad = 7;
        $t17->nombre_completo = 'María Santísima de la Paz';
        $t17->nombre_corto = 'Virgen de la Paz';
        $t17->banda = 'Banda de Música Nuestra Señora del Águila de Alcalá de Guadaíra';
        $t17->imagen = 'Carrusel_Paz.jpg';
        
        $t17->save();

        $t18 = new Titulare();

        $t18->id_hermandad = 8;
        $t18->nombre_completo = 'Santísimo Cristo del Amor';
        $t18->nombre_corto = 'Cristo del Amor';
        $t18->banda = 'Banda de Cornetas Coronación de Campillos';
        $t18->imagen = 'Carrusel_Amor.jpg';
        
        $t18->save();

        $t19 = new Titulare();

        $t19->id_hermandad = 8;
        $t19->nombre_completo = 'Nuestra Señora de las Veredas';
        $t19->nombre_corto = 'Virgen de las Veredas';
        $t19->banda = 'Banda de Música Municipal de Arahal';
        $t19->imagen = 'Carrusel_Veredas.jpg';
        
        $t19->save();

        $t20 = new Titulare();

        $t20->id_hermandad = 9;
        $t20->nombre_completo = 'Santísimo Cristo de la Caridad en su Sagrado Descendimiento y María Santísima de la Piedad';
        $t20->nombre_corto = 'Cristo de la Caridad y Virgen de la Piedad';
        $t20->banda = 'Banda de Cornetas y Tambores Jesús Nazareno de Utrera';
        $t20->imagen = 'Carrusel_Caridad_Piedad.jpg';
        
        $t20->save();

        $t21 = new Titulare();

        $t21->id_hermandad = 9;
        $t21->nombre_completo = 'Nuestra Señora de los Ángeles en su Soledad';
        $t21->nombre_corto = 'Virgen de los Ángeles';
        $t21->banda = 'Banda de Música El Saucejo';
        $t21->imagen = 'Carrusel_Angeles.jpg';
        
        $t21->save();

        $t22 = new Titulare();

        $t22->id_hermandad = 10;
        $t22->nombre_completo = 'Santo Crucifijo de los Milagros';
        $t22->nombre_corto = 'Cristo de los Milagros';
        $t22->banda = 'Grupo Vocal De Profundis';
        $t22->imagen = 'Carrusel_Milagros.jpg';
        
        $t22->save();

        $t23 = new Titulare();

        $t23->id_hermandad = 10;
        $t23->nombre_completo = 'María Santísima de la Concepción';
        $t23->nombre_corto = 'Virgen de la Concepción';
        $t23->banda = 'Grupo Vocal Profundis';
        $t23->imagen = 'Carrusel_Concepcion.jpg';
        
        $t23->save();
    }
}
