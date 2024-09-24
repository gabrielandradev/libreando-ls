<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Loan extends Model
{
    use HasFactory;

    protected $table = 'Prestamo';
    public $timestamps = false;

    protected $fillable = [
        'id_libro',
        'id_usuario',
        'fecha_solicitud',
        'fecha_prestamo',
        'fecha_devolucion',
        'id_estado_prestamo'
    ];

    protected $hidden = [
        'id'
    ];

    public function book(): BelongsTo {
        return $this->belongsTo(Book::class, 'id_libro');
    }

    public function borrower(): BelongsTo {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function loanStatus(): BelongsTo {
        return $this->belongsTo(LoanStatus::class, 'id_estado_prestamo');
    }

    public function pending(): BelongsTo {
        return $this
        ->belongsTo(LoanStatus::class, 'id_estado_prestamo')
        ->where('estado', LoanStatus::STATUS_PENDING);
    }

    public function onLoan(): BelongsTo {
        return $this
        ->belongsTo(LoanStatus::class, 'id_estado_prestamo')
        ->where('estado', LoanStatus::STATUS_ON_LOAN);
    }
}