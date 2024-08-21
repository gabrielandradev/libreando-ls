<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Book extends Authenticatable
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
        'isbn',
        'desc_primario',
        'desc_secundario',
        'idioma',
        'notas',
        'num_paginas'
    ];

    protected $hidden = [
        'id'
    ];
}