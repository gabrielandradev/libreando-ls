<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanStatus extends Model
{
    use HasFactory;

    protected $table = 'Estado_Prestamo';
    public $timestamps = false;

    public const STATUS_PENDING = 'pendiente';
    public const STATUS_APPROVED = 'aprobado';
    public const STATUS_CANCELLED = 'cancelado';
    public const STATUS_ON_LOAN = 'prestado';
    public const STATUS_RETURNED = 'devuelto';
    public const STATUS_LATE = 'atrasado';

    public const STATUSES = [
        self::STATUS_PENDING,
        self::STATUS_APPROVED,
        self::STATUS_CANCELLED,
        self::STATUS_ON_LOAN,
        self::STATUS_RETURNED,
        self::STATUS_LATE
    ];

    protected $fillable = [
        'estado'
    ];

    protected $hidden = [
        'id'
    ];
}
