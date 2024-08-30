<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookUpdateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'autores' => ['required', 'string'],
            'num_inventario' => ['required', 'string', 'alpha_dash:ascii', 'unique:libro'],
            'ubicacion_fisica' => ['required', 'string', 'alpha_dash:ascii'],
            'titulo' => ['required', 'string'],
            'isbn' => ['required', 'numeric'],
            'editorial' => ['required', 'string'],
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