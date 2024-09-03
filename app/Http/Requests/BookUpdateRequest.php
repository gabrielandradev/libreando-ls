<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookUpdateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'autores' => ['required', 'array'],
            'autores-*' => ['string', 'distinct'],
            'ubicacion_fisica' => ['required', 'string', 'alpha_dash:ascii'],
            'titulo' => ['required', 'string'],
            'isbn' => ['required'],
            'editorial' => ['required', 'string'],
            'año_edicion' => ['integer', 'numeric'],
            'num_edicion' => ['integer', 'numeric'],
            'lugar_edicion' => ['string'],
            'desc_primario' => ['required', 'string'],
            'desc_secundario' => ['required', 'array'],
            'desc_secundario-*' => ['string', 'distinct'],
            'idioma' => ['required', 'string'],
            'notas' => ['string'],
            'num_paginas' => ['integer']
        ];
    }
}