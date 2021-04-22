<?php

namespace Database\Factories;

use App\Models\Tasklist;
use Illuminate\Database\Eloquent\Factories\Factory;

class TasklistFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tasklist::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->domainName,
            'description' => $this->faker->paragraph(1),
        ];
    }
}
