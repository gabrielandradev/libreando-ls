<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountStatus extends Model
{
    use HasFactory;

    protected $table = 'Estado_Cuenta';
    public $timestamps = false;

    public const STATUS_PENDING = 'pendiente';
    public const STATUS_ACTIVE = 'activa';
    public const STATUS_BLOCKED = 'bloqueada';

    public const STATUSES = [
        self::STATUS_PENDING,
        self::STATUS_ACTIVE,
        self::STATUS_BLOCKED
    ];

    protected $fillable = [
        'estado'
    ];

    protected $hidden = [
        'id'
    ];
}
