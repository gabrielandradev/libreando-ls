<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'Administrador';
    protected $primaryKey = 'dni';
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'dni',
        'id_usuario',
        'apellido',
        'nombre',
        'telefono',
        'funcion'
    ];

    protected $hidden = [
    ];
}
