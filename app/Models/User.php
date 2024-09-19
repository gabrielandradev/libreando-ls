<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Pagination\LengthAwarePaginator;

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

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'id_rol');
    }

    public function accountStatus(): BelongsTo
    {
        return $this->belongsTo(AccountStatus::class, 'id_estado_cuenta');
    }

    public function pendingAccount(): BelongsTo {
        return $this
        ->belongsTo(AccountStatus::class, 'id_estado_cuenta')
        ->where('estado', AccountStatus::STATUS_PENDING);
    }

    public function isAdmin(): bool {
        return $this->role->nombre == Role::ROLE_ADMIN;
    }
}
