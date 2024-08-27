<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Constants\Rol;
use App\Constants\EstadoCuenta;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'Usuario';
    public $timestamps = false;

    protected $fillable = [
        'email',
        'contraseña',
        'id_rol',
        'id_estado_cuenta'
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

    public function hasRole($role): bool
    {
        return $this->id_rol == Rol::getKey($role);
    }

    public function hasAccountStatus($status): bool
    {
        return $this->id_estado_cuenta == EstadoCuenta::getKey($status);
    }
}
