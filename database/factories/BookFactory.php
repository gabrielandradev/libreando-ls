<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class BookFactory extends Factory
{

    public function definition(): array
    {
        return [
            'num_inventario' => fake()->numberBetween(1, 100000),
            'ubicacion_fisica' => fake()->address(),
            'titulo' => fake()->streetName(),
            'isbn_10' => fake()->isbn10(),
            'isbn_13' => fake()->isbn13(),
            'año_edicion' => fake()->year(),
            'num_edicion' => fake()->numberBetween(1, 10),
            'lugar_edicion' => fake()->city(),
            'desc_primario' => fake()->lastName(),
            'desc_secundario' => fake()->lastName(),
            'idioma' => fake()->languageCode(),
            'notas' => fake()->sentence(),
            'n'
        ];
    }
}
