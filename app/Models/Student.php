<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'Estudiante';
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
        'id_turno',
        'id_especialidad',
        'telefono',
        'domicilio'
    ];

    protected $hidden = [
    ];

    public function major(): BelongsTo {
        return $this->belongsTo(Major::class, 'id_especialidad');
    }

    public function shift(): BelongsTo {
        return $this->belongsTo(Shift::class, 'id_turno');
    }
}
