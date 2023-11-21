<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => random_int(1, 3),
            'title' => $this->faker->word(),
            'text' => $this->faker->text(),
            'price' => $this->faker->randomNumber(1),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
