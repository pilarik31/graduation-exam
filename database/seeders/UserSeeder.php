<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'firstname' => 'Jan',
            'lastname' => 'Pilař',
            'email' => 'pilarjan4111@gmail.com',
            'password' => Hash::make('admin'),
            'phone' => '720060552',
            'birthday' => Date::createFromDate(2000, 11, 19),
            'address' => 'Havlíčkova 492',
            'city' => 'Žleby',
            'role_id' => 1,
        ]);
        DB::table('users')->insert([
            'firstname' => 'Realizátor',
            'lastname' => 'Realizátorovič',
            'email' => 'realizator@honzapilar.cz',
            'password' => Hash::make('admin'),
            'phone' => '720060552',
            'birthday' => Date::createFromDate(2000, 11, 19),
            'address' => 'Havlíčkova 492',
            'city' => 'Žleby',
            'role_id' => 2,
        ]);
        DB::table('users')->insert([
            'firstname' => 'Klient',
            'lastname' => 'Klientovič',
            'email' => 'klient@honzapilar.cz',
            'password' => Hash::make('admin'),
            'phone' => '720060552',
            'birthday' => Date::createFromDate(2000, 11, 19),
            'address' => 'Havlíčkova 492',
            'city' => 'Žleby',
            'role_id' => 3
        ]);
        User::factory(5)->create();
    }
}
