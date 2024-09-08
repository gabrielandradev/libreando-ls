<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\AccountStatus;

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
            'id_rol' => Role::where('nombre', Role::ROLE_ADMIN)->first()->id,
            'id_estado_cuenta' => AccountStatus::where('estado', AccountStatus::STATUS_PENDING)->first()->id
        ];
    }
}
