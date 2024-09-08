<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'Rol';
    public $timestamps = false;

    public const ROLE_ADMIN = 'administrador';
    public const ROLE_STUDENT = 'estudiante';
    public const ROLE_TEACHER = 'profesor';

    public const ROLES = [
        self::ROLE_ADMIN,
        self::ROLE_STUDENT,
        self::ROLE_TEACHER
    ];

    protected $fillable = [
        'nombre'
    ];

    protected $hidden = [
        'id'
    ];
}
