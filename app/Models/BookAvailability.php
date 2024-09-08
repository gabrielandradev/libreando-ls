<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookAvailability extends Model
{
    use HasFactory;

    protected $table = 'Disponibilidad_Libro';
    public $timestamps = false;

    public const STATUS_AVAILABLE = 'disponible';
    public const STATUS_BLOCKED = 'bloqueado';
    public const STATUS_SUSPENDED = 'suspendido';
    public const STATUS_ON_LOAN = 'prestado';

    public const STATUSES = [
        self::STATUS_AVAILABLE,
        self::STATUS_BLOCKED,
        self::STATUS_SUSPENDED,
        self::STATUS_ON_LOAN
    ];

    protected $fillable = [
        'estado'
    ];

    protected $hidden = [
        'id'
    ];
}
