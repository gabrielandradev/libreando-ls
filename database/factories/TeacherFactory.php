<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{

    public function definition(): array
    {
        return [
            'dni' => fake()->unique()->numberBetween(40000000, 60000000),
            'id_usuario' => fake()->unique()->numberBetween(1, 50),
            'apellido' => fake()->lastName(),
            'nombre' => fake()->firstName(),
            'especialidad' => 'fisica',
            'telefono' => fake()->phoneNumber(),
            'domicilio' => fake()->address(),
        ];
    }
}
