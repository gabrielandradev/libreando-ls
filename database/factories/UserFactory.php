<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Constants\Rol;
use App\Constants\EstadoCuenta;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'email' => fake()->safeEmail(),
            'contraseña' => static::$password ??= Hash::make('password'),
            'id_rol' => Rol::getKey('administrador'),
            'id_estado_cuenta' => EstadoCuenta::getKey('activada')
        ];
    }
}
