<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'Libro';
    public $timestamps = false;

    protected $fillable = [
        'ubicacion_fisica',
        'titulo',
        'autor',
        'año_edicion',
        'num_edicion',
        'lugar_edicion',
        'isbn_10',
        'isbn_13',
        'desc_primario',
        'desc_secundario',
        'idioma',
        'notas',
        'num_paginas',
        'disponibilidad'
    ];

    protected $hidden = [
        'id'
    ];
}