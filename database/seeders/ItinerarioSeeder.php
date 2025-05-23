<?php

namespace Database\Seeders;

use App\Models\Itinerario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItinerarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $i1 = new Itinerario();

        $i1->id_hermandad = 1;
        $i1->dia = 'Viernes Santo';
        $i1->recorrido = 'SALIDA (Capilla de San Francisco 19:30), Antonio Sousa, Fray Cipriano, Preciosa, Padre Miguel Román, Parroquia de Santa María (20:05), Rodrigo Caro, Perafán de Ribera, Parroquia de Santiago (20:50), Ruiz Gijón, Plaza de la Constitución, CARRERA OFICIAL (21:10), AYUNTAMIENTO, Álvarez Quintero, Doctor Pastor, Fajardo, Sevilla, Partera, Clemente de la Cuadra, Álvarez Quintero, Alcalde Vicente Giráldez, Virgen de Consolación, RECOGIDA (Capilla de San Francisco 23:30)';
        $i1->imagen = 'Itinerario_Vera_Cruz_Viernes.jpg';
        $i1->aceptado = true;

        $i1->save();

        $i2 = new Itinerario();

        $i2->id_hermandad = 1;
        $i2->dia = 'Sábado Santo';
        $i2->recorrido = 'SALIDA (Capilla de San Francisco 18:30), Clemente de la Cuadra, Plaza de Gibaxa, AYUNTAMIENTO, Álvarez Quintero, Sevilla, Fajardo, Maestro Bernabé García, La Corredera, Plaza Santa Ana, La Fuente Vieja,  CARRERA OFICIAL (18:30), Plaza del Altozano, Clemente de la Cuadra – Canalejas – Rueda – Ramón y Cajal – Alcalde Vicente Giráldez – Virgen de Consolación RECOGIDA (Capilla de San Francisco 23:45)';
        $i2->imagen = 'Itinerario_Vera_Cruz_Sabado.jpg';
        $i2->aceptado = true;

        $i2->save();

        $i3 = new Itinerario();

        $i3->id_hermandad = 2;
        $i3->dia = 'Domingo de Ramos';
        $i3->recorrido = 'SALIDA (Capilla de San Bartolomé 17:30), Álvarez Hazañas, Preciosa, Menéndez Pelayo, Mota, Parroquia de Santa María (18:15), Rodrigo Caro, Paseo de Ribera, Parroquia de Santiago (18:45), CARRERA OFICIAL (19:05), Clemente de la Cuadra, Ramón y Cajal, Sevilla, Santiago Montoto, Doctor Pastor, Forcadell, Partera, Clemente de la Cuadra, AYUNTAMIENTO, Clemente de la Cuadra, Virgen de Consolación, San Juan Bosco, RECOGIDA (Capilla de San Bartolomé 22:00)';
        $i3->imagen = 'Itinerario_Jesus_Domingo.jpg';
        $i3->aceptado = true;

        $i3->save();

        $i4 = new Itinerario();

        $i4->id_hermandad = 2;
        $i4->dia = 'Viernes Santo';
        $i4->recorrido = 'SALIDA (Capilla de San Bartolomé 06:30), San Juan Bosco, Álvarez Hazañas, Sacramento, Fray Cipriano de Utrera, Menéndez Pelayo, Padre Miguel Román, Parroquia de Santa María (08:00), Rodrigo Caro, La Plaza, Monumento Santa Ángela, Catalina de Perea, Parroquia de Santiago (09:00), Plaza del Altozano, Plaza de la Constitución, Sevilla, Alcalde Fernández Heredia, AYUNTAMIENTO, Clemente de la Cuadra, Partera, Sevilla, Fajardo, Doctor Pastor, Isaac Peral, Corredera, Plaza de Santa Ana, Fuente Vieja, Plaza de la Constitución, CARRERA OFICIAL (11:50), Virgen de Consolación, San Juan Bosco, RECOGIDA (Capilla de San Bartolomé 12:45)';
        $i4->imagen = 'Itinerario_Jesus_Viernes.jpg';
        $i4->aceptado = true;

        $i4->save();

        $i5 = new Itinerario();

        $i5->id_hermandad = 3;
        $i5->dia = 'Domingo de Ramos';
        $i5->recorrido = 'SALIDA (Capilla de La Trinidad 11:00), Cristo de los Afligidos, Virgen de la Cabeza, Fernanda y Bernarda, Fuente Vieja, Sevilla, Álvarez Quintero, AYUNTAMIENTO, Clemente de la Cuadra, CARRERA OFICIAL (12:50), Perafán de Ribera, La Plaza, Catalina de Pérez, Virgen del Rocío, Cristo de los Afligidos, RECOGIDA (Capilla de La Trinidad 14:15)';
        $i5->imagen = 'Itinerario_Trinidad_Domingo.jpg';
        $i5->aceptado = true;

        $i5->save();

        $i6 = new Itinerario();

        $i6->id_hermandad = 3;
        $i6->dia = 'Jueves Santo';
        $i6->recorrido = 'SALIDA (Capilla de la Trinidad 19:30), Cristo de los Afligidos, Virgen de la Cabeza, Virgen del Rocío, Catalina de Perea, Ponce de León, Parroquia de Santiago (21:00), Ruiz Gijón, CARRERA OFICIAL (21:30), Clemente de la Cuadra, AYUNTAMIENTO, Álvarez Quintero, Sevilla, Plaza de la Constitución, Perafán de Ribera, La Plaza, Catalina de Perea, Virgen del Rocío, Cristo de los Afligidos, RECOGIDA (Capilla de la Trinidad 00:15)';
        $i6->imagen = 'Itinerario_Trinidad_Jueves.jpg';
        $i6->aceptado = true;

        $i6->save();

        $i7 = new Itinerario();

        $i7->id_hermandad = 4;
        $i7->dia = 'Jueves Santo';
        $i7->recorrido = 'SALIDA (Parroquia de Santiago 22:00), Ruiz Gijón, Fuente Vieja, Nueva, Lope Díaz, Eduardo Dato, Corredera, M. Bernabé García, Fajardo, Sevilla, Partera, AYUNTAMIENTO (23:35), Canalejas, Vicente Giráldez, Ramón y Cajal, Finita. Sevilla, Plaza de la Constitución, CARRERA OFICIAL (00:30), Antonio Sousa, Fray Cipriano, Preciosa, Parroquia de Santa María (01:05), Porche, Rodrigo Caro, La Plaza, Catalina de Perea, RECOGIDA (Parroquia de Santiago 01:45)';
        $i7->imagen = 'Itinerario_Cautivo.jpg';
        $i7->aceptado = true;

        $i7->save();

        $i8 = new Itinerario();

        $i8->id_hermandad = 5;
        $i8->dia = 'Lunes Santo';
        $i8->recorrido = 'SALIDA (Santuario de Ntra. Sra. de Consolación 18:00), Paseo de Consolación, Hogar del Pensionista, Bernardino Álvarez, Molino, Ramón y Cajal, Vicente Giráldez, Virgen de Consolación, Plaza del Altozano, Álvarez Hazañas, Antonio Sousa, Fray Cipriano, Menéndez Pelayo, Parroquia de Santa María (20:45), Rodrigo Caro, La Plaza, Paseo de Ribera, CARRERA OFICIAL (21:30), Virgen de Consolación, Cristóbal Colón, Parque de Consolación, Paseo de Consolación, RECOGIDA (Santuario de Ntra. Sra. de Consolación 00:45)';
        $i8->imagen = 'Itinerario_Muchachos.jpg';
        $i8->aceptado = true;

        $i8->save();

        $i9 = new Itinerario();

        $i9->id_hermandad = 6;
        $i9->dia = 'Madrugá';
        $i9->recorrido = 'SALIDA (Parroquia de Santiago 00:30), Ponce de León, CARRERA OFICIAL (01:00), Virgen de Consolación, Alcalde Vicente Giráldez, Canalejas, Rueda, Ramón y Cajal, Sevilla, Alcalde Fernández Heredia, Clemente de la Cuadra, AYUNTAMIENTO (03:45), Clemente de la Cuadra, Partera, Sevilla, Fajardo, Doctor Pastor, Ruiz Gijón, RECOGIDA (Parroquia de Santiago 05:30)';
        $i9->imagen = 'Itinerario_Gitanos.jpg';
        $i9->aceptado = true;

        $i9->save();

        $i10 = new Itinerario();

        $i10->id_hermandad = 7;
        $i10->dia = 'Miércoles Santo';
        $i10->recorrido = 'SALIDA (Parroquia de Santa María de la Mesa 19:00), Padre Miguel Román, Menéndez Pelayo, Mota de Santa María, Catalina Parra, Plaza Enrique de la Cuadra, Catalina de Perea, Ponce de León, Parroquia de Santiago, CARRERA OFICIAL (20:15), Virgen de Consolación, Alcalde Vicente Giráldez, Ramón y Cajal, Sevilla, Partera, Clemente de la Cuadra, AYUNTAMIENTO, Clemente de la Cuadra, Álvarez Hazañas, Sacramento, Preciosa, Menéndez Pelayo, La Plaza, Rodrigo Caro, RECOGIDA (Parroquia de Santa María de la Mesa 00:00)';
        $i10->imagen = 'Itinerario_Aceituneros.jpg';
        $i10->aceptado = true;

        $i10->save();

        $i11 = new Itinerario();

        $i11->id_hermandad = 8;
        $i11->dia = 'Martes Santo';
        $i11->recorrido = 'SALIDA (Basílica de María Auxiliadora 19:00), San Juan Bosco, M. Auxiliadora, Ramón y Cajal, C. de la Cuadra, Plaza Gibaxa, AYUNTAMIENTO, C. de la Cuadra, Partera, Sevilla, Alcalde Fernández Heredia, Clemente de la Cuadra, Plaza del Altozano, Álvarez Hazañas, Sacramento, Preciosa, M. Pelayo, Padre Miguel Román, Parroquia de Santa María (22:00), Rodrigo Caro, La Plaza, Perafán de Ribera, CARRERA OFICIAL (23:00), Virgen de Consolación, San Juan Bosco, RECOGIDA (Basílica de María Auxiliadora 00:00)';
        $i11->imagen = 'Itinerario_Estudiantes.jpg';
        $i11->aceptado = true;

        $i11->save();

        $i12 = new Itinerario();

        $i12->id_hermandad = 9;
        $i12->dia = 'Domingo de Ramos';
        $i12->recorrido = 'SALIDA (Parroquia de Santa María 19:00), Porche de Santa María, Rodrigo Caro, La Plaza, Plaza Enrique de la Cuadra, Monumento Santa Ángela, Catalina de Perea, Parroquia de Santiago (20:45), Ponce de León, Plaza del Altozano, Plaza de la Constitución, Sevilla, Partera, Clemente de la Cuadra, AYUNTAMIENTO, Clemente de la Cuadra, CARRERA OFICIAL (22:30), Perafán de Ribera, Menéndez Pelayo, Padre Miguel Román, RECOGIDA (Parroquia de Santa María 00:00)';
        $i12->imagen = 'Itinerario_Quinta_Angustia.jpg';
        $i12->aceptado = true;

        $i12->save();

        $i13 = new Itinerario();

        $i13->id_hermandad = 10;
        $i13->dia = 'Viernes Santo';
        $i13->recorrido = 'SALIDA (Parroquia de Santa María 22:30), Padre Miguel Román, Menéndez Pelayo, Mota de Santa María, Rodrigo Caro; La Plaza, Catalina de Perea, Ponce de León, Parroquia de Santiago (23:45), Ruiz Gijón, Sevilla, Álvarez Quintero, AYUNTAMIENTO, Canalejas, Rueda, Clemente de la Cuadra, CARRERA OFICIAL (00:50), La Plaza, Menéndez Pelayo, RECOGIDA (Parroquia de Santa María 01:30)';
        $i13->imagen = 'Itinerario_Milagros.jpg';
        $i13->aceptado = true;

        $i13->save();

        // $i = new Itinerario();

        // $i->id_hermandad = 0;
        // $i->dia = ' Santo';
        // $i->recorrido = '';
        // $i->imagen = 'Itinerario_.jpg';
        // $i->aceptado = true;

        // $i->save();
    }
}
