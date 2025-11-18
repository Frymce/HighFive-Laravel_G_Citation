<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blague>
 */
class BlagueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'author' => fake()->name(),
            'content' => fake()->sentence(10), // on veut 15 mots
            'user_id' => function () {
                return User::inRandomOrder()->first()->id;
            },
        ];
    }
}
