<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dni' => fake()->unique()->numberBetween(40000000, 60000000),
            'id_usuario' => fake()->numberBetween(1, 10),
            'apellido' => fake()->lastName(),
            'nombre' => fake()->firstName(),
            'especialidad' => 'electrica',
            'telefono' => fake()->phoneNumber(),
            'domicilio' => fake()->address(),
        ];
    }
}
