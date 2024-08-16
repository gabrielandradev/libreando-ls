<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Teacher extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'profesor';
    protected $primaryKey = 'dni';
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'dni',
        'id_usuario',
        'apellido',
        'nombre',
        'especialidad',
        'telefono',
        'domicilio',
    ];

    protected $hidden = [
        'id_usuario'
    ];
}
