<?php

namespace Database\Seeders;

use App\Models\Tasklist;
use Illuminate\Database\Seeder;

class TasklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tasklist::factory(10)->create();
    }
}
