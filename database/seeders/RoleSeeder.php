<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'name' => 'Administrátor'
        ]);
        DB::table('roles')->insert([
            'name' => 'Realizátor'
        ]);
        DB::table('roles')->insert([
            'name' => 'Zadavatel'
        ]);
    }
}
