<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class AdminFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'dni' => fake()->unique()->numberBetween(40000000, 60000000),
            'id_usuario' => fake()->unique()->numberBetween(1, 10000),
            'apellido' => fake()->lastName(),
            'nombre' => fake()->firstName(),
            'telefono' => fake()->phoneNumber(),
            'funcion' => fake()->jobTitle()
        ];
    }
}
