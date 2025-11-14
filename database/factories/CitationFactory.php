<?php

namespace Database\Factories;

use App\Models\Citation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Citation>
 */
class CitationFactory extends Factory
{

    protected $model = Citation::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'author' => fake()->name(),
            'content' => fake()->sentence(15), // on veut 15 mots
            'user_id' => function (){
                return User::inRandomOrder()->first()->id;
            },
        ];
    }
}
