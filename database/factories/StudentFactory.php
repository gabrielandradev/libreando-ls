<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class StudentFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'dni' => fake()->unique()->numberBetween(40000000, 60000000),
            'id_usuario' => fake()->numberBetween(1, 10),
            'apellido' => fake()->lastName(),
            'nombre' => fake()->firstName(),
            'año' => fake()->numberBetween(1, 6),
            'division' => fake()->numberBetween(1, 10),
            'turno' => 'tarde',
            'especialidad' => 'electrica',
            'domicilio' => fake()->address(),
            'telefono' => fake()->phoneNumber(),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
