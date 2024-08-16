<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'estudiante';
    protected $primaryKey = 'dni';
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'dni',
        'id_usuario',
        'apellido',
        'nombre',
        'año',
        'division',
        'turno',
        'especialidad',
        'telefono',
        'domicilio'
    ];

    protected $hidden = [
        'id_usuario'
    ];
}
