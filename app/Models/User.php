<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'Usuario';
    public $timestamps = false;

    protected $fillable = [
        'email',
        'contraseña',
        'rol'
    ];

    protected $hidden = [];

    public function getAuthPassword(): string
    {
        return $this->contraseña;
    }

    protected function casts(): array
    {
        return [
            'contraseña' => 'hashed'
        ];
    }

    public function isAdmin(): bool
    {
        return $this->rol == 'administrador';
    }
}
