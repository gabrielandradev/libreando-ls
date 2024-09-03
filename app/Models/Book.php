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
        'editorial',
        'año_edicion',
        'num_edicion',
        'lugar_edicion',
        'isbn',
        'desc_primario',
        'idioma',
        'notas',
        'num_paginas',
        'id_disponibilidad',
        'fecha_creacion',
        'fecha_edicion',
    ];

    protected $hidden = [
        'id'
    ];
}