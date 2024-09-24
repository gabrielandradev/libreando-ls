<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Shift;
use App\Models\Major;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class StudentFactory extends Factory
{

    public function definition(): array
    {
        return [
            'dni' => fake()->unique()->numberBetween(40000000, 60000000),
            'id_usuario' => fake()->unique()->numberBetween(1, 50),
            'apellido' => fake()->lastName(),
            'nombre' => fake()->firstName(),
            'año' => fake()->numberBetween(1, 6),
            'division' => fake()->numberBetween(1, 10),
            'id_turno' => fake()->numberBetween(0, 1),
            'id_especialidad' => fake()->numberBetween(0, 5),
            'telefono' => fake()->phoneNumber(),
            'domicilio' => fake()->address(),
        ];
    }
}
