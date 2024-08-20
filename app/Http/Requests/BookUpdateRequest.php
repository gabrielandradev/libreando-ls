<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookUpdateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            // Example usage
            // 'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'num_inventario' => ['required', 'string', 'alpha_dash:ascii', 'unique:libro'],
            'ubicacion_fisica' => ['required', 'string', 'apha_dash:ascii'],
            'titulo' => ['required', 'string'],
            'isbn' => ['integer'],
            'año_edicion' => ['integer', 'numeric'],
            'num_edicion' => ['integer', 'numeric'],
            'lugar_edicion' => ['string'],
            'desc_primario' => ['required', 'string'],
            'desc_secundario' => ['required, string'],
            'idioma' => ['required', 'string'],
            'notas' => ['string'],
            'num_paginas' => ['integer']
        ];
    }
}
