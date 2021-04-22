<?php

namespace Database\Seeders;

use App\Models\Tasklist;
use Illuminate\Database\Seeder;

class TasklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tasklist::factory(10)->create();
    }
}
