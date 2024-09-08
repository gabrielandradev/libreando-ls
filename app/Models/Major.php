<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $table = 'Especialidad';
    public $timestamps = false;

    public const MAJOR_COMPUTACION = 'computacion';
    public const MAJOR_CONSTRUCCIONES = 'construcciones';
    public const MAJOR_QUIMICA = 'quimica';
    public const MAJOR_MECANICA = 'mecanica';
    public const MAJOR_ELECTRICA = 'electrica';
    public const MAJOR_ELECTRONICA = 'electronica';

    public const MAJORS = [
        self::MAJOR_COMPUTACION,
        self::MAJOR_CONSTRUCCIONES,
        self::MAJOR_QUIMICA,
        self::MAJOR_MECANICA,
        self::MAJOR_ELECTRICA,
        self::MAJOR_ELECTRONICA
    ];

    protected $fillable = [
        'nombre'
    ];

    protected $hidden = [
        'id'
    ];
}
