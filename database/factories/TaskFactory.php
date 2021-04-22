<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->firstNameFemale,
            'description' => $this->faker->paragraph,
            'client_id' => 2,
            'implementer_id' => 1,
            'from' => $this->faker->dateTime,
            'to' => $this->faker->dateTime,
        ];
    }
}
