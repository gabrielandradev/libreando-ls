<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Teacher extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'Profesor';
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
        
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
