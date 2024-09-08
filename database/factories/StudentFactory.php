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
            'id_usuario' => fake()->unique()->numberBetween(1, 10000),
            'apellido' => fake()->lastName(),
            'nombre' => fake()->firstName(),
            'año' => fake()->numberBetween(1, 6),
            'division' => fake()->numberBetween(1, 10),
            'turno' => Shift::SHIFT_MORNING,
            'especialidad' => Major::MAJOR_COMPUTACION,
            'telefono' => fake()->phoneNumber(),
            'domicilio' => fake()->address(),
        ];
    }
}
