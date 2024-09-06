<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisponibilidadLibro extends Model
{
    use HasFactory;

    protected $table = 'Disponibilidad_Libro';
    public $timestamps = false;

    protected $fillable = [
        "estado"
    ];

    protected $hidden = [
        "id"
    ]; 
}
