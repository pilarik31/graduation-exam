<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomElement([1, 2, 3, 4, 5,]),
            'content' => $this->faker->paragraph(1),
            'task_id' => $this->faker->randomElement([1, 2, 3, 4, 5,]),
        ];
    }
}
