<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $table = 'Turno';
    public $timestamps = false;

    public const SHIFT_MORNING = 'mañana';
    public const SHIFT_AFTERNOON = 'tarde';

    public const SHIFTS = [
        self::SHIFT_MORNING,
        self::SHIFT_AFTERNOON
    ];
    
    protected $fillable = [
        'nombre'
    ];

    protected $hidden = [
        'id'
    ];
}
