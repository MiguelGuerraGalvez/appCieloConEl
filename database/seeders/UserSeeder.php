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
        $u1->password = '12345678';

        $u1->save();

        $u2 = new User();

        $u2->name = 'Jesús';
        $u2->email = 'jesus.gomez-garcia@iesruizgijon.com';
        $u2->password = '12345678';

        $u2->save();
    }
}
