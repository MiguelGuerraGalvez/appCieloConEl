<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $u1 = new User();

        $u1->name = 'Miguel';
        $u1->email = 'miguel.guerra-galvez@iesruizgijon.com';
        $u1->icon = 'HEADER_ENLACE_HERMANDADES.jpg';
        $u1->tel_number = 722783138;
        $u1->password = '12345678';
        $u1->rol = 'user';

        $u1->save();

        $u2 = new User();

        $u2->name = 'Jesús';
        $u2->email = 'jesus.gomez-garcia@iesruizgijon.com';
        $u2->icon = 'Usuario_Default.png';
        $u2->tel_number = 687080187;
        $u2->password = '12345678';
        $u2->rol = 'user';

        $u2->save();

        $u3 = new User();

        $u3->name = 'Vera+Cruz';
        $u3->email = 'vc@gmail.com';
        $u3->icon = 'Escudo_VeraCruz.png';
        $u3->tel_number = 642365412;
        $u3->password = '12345678';
        $u3->rol = 'hermandad';

        $u3->save();

        $u4 = new User();

        $u4->name = 'Consejo';
        $u4->email = 'consejo@gmail.com';
        $u4->icon = 'Consejo_Icon.png';
        $u4->tel_number = 756362415;
        $u4->password = '12345678';
        $u4->rol = 'consejo';

        $u4->save();

        $u5 = new User();

        $u5->name = 'Jesús Nazareno';
        $u5->email = 'js@gmail.com';
        $u5->icon = 'Escudo_Jesus_Nazareno.png';
        $u5->tel_number = 246987854;
        $u5->password = '12345678';
        $u5->rol = 'hermandad';

        $u5->save();

        $u6 = new User();
        $u6->name = 'Trinidad';
        $u6->email = 'trinidad@gmail.com';
        $u6->icon = 'Escudo_Trinidad.png';
        $u6->tel_number = 687423159;
        $u6->password = '12345678';
        $u6->rol = 'hermandad';
        $u6->save();

        $u7 = new User();
        $u7->name = 'Cautivo';
        $u7->email = 'cautivo@gmail.com';
        $u7->icon = 'Escudo_Cautivo.png';
        $u7->tel_number = 654987321;
        $u7->password = '12345678';
        $u7->rol = 'hermandad';
        $u7->save();

        $u8 = new User();
        $u8->name = 'Muchachos de Consolación';
        $u8->email = 'muchachos@gmail.com';
        $u8->icon = 'Escudo_Muchachos.png';
        $u8->tel_number = 612345789;
        $u8->password = '12345678';
        $u8->rol = 'hermandad';
        $u8->save();

        $u9 = new User();
        $u9->name = 'Gitanos';
        $u9->email = 'gitanos@gmail.com';
        $u9->icon = 'Escudo_Gitanos.png';
        $u9->tel_number = 698745123;
        $u9->password = '12345678';
        $u9->rol = 'hermandad';
        $u9->save();

        $u10 = new User();
        $u10->name = 'Aceituneros';
        $u10->email = 'aceituneros@gmail.com';
        $u10->icon = 'Escudo_Aceituneros.png';
        $u10->tel_number = 633221144;
        $u10->password = '12345678';
        $u10->rol = 'hermandad';
        $u10->save();

        $u11 = new User();
        $u11->name = 'Estudiantes';
        $u11->email = 'estudiantes@gmail.com';
        $u11->icon = 'Escudo_Estudiantes.png';
        $u11->tel_number = 677889922;
        $u11->password = '12345678';
        $u11->rol = 'hermandad';
        $u11->save();

        $u12 = new User();
        $u12->name = 'Quinta Angustia';
        $u12->email = 'quintaangustia@gmail.com';
        $u12->icon = 'Escudo_Quinta_Angustia.png';
        $u12->tel_number = 655443322;
        $u12->password = '12345678';
        $u12->rol = 'hermandad';
        $u12->save();

        $u13 = new User();
        $u13->name = 'Los Milagros';
        $u13->email = 'milagros@gmail.com';
        $u13->icon = 'Escudo_Los_Milagros.png';
        $u13->tel_number = 699887766;
        $u13->password = '12345678';
        $u13->rol = 'hermandad';
        $u13->save();
    }
}
