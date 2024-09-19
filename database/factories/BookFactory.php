<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\BookAvailability;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class BookFactory extends Factory
{

    public function definition(): array
    {
        return [
            'ubicacion_fisica' => fake()->city(),
            'titulo' => fake()->firstName(),
            'isbn' => fake()->isbn13(),
            'editorial' => fake()->firstNameFemale(),
            'año_edicion' => fake()->year(),
            'num_edicion' => fake()->numberBetween(1, 10),
            'num_paginas' => fake()->numberBetween(1, 300),
            'lugar_edicion' => fake()->city(),
            'desc_primario' => fake()->lastName(),
            'idioma' => fake()->languageCode(),
            'notas' => fake()->text(),
            'id_disponibilidad' => BookAvailability
                ::where('estado', BookAvailability::STATUS_AVAILABLE)
                ->first()->id,
            'fecha_creacion' => fake()->date(),
            'fecha_edicion' => fake()->date()
        ];
    }
}
