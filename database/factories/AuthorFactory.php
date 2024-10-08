<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class AuthorFactory extends Factory
{

    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
        ];
    }
}
