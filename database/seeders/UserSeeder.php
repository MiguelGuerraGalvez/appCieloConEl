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
        $u1->icon = 'Usuario_Default.png';
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
        $u3->icon = 'VeraCruz_Icon.png';
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
    }
}
