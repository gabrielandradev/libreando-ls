<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $table = 'Prestamo';
    public $timestamps = false;

    protected $fillable = [
        'id_libro',
        'id_usuario',
        'fecha_prestamo',
        'fecha_devolucion',
        'id_estado_prestamo'
    ];

    protected $hidden = [
    ];
}