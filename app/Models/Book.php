<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function authors(): BelongsToMany {
        return $this->belongsToMany(Author::class, 'Libro_Autor', 'id_libro', 'id_autor');
    }

    public function secondaryDescs(): BelongsToMany {
        return $this->belongsToMany(SecondaryDesc::class, 'Libro_Descriptor_Secundario', 'id_libro', 'id_descriptor_sec');
    }

    public function availability(): BelongsTo {
        return $this->belongsTo(BookAvailability::class, 'id_disponibilidad');
    }
}