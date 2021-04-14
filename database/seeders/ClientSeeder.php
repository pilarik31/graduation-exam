<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
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
        Client::factory(5)->create();
    }
}
