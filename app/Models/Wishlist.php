<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'Wishlist';
    public $timestamps = false;

    protected $fillable = [
        'id_libro',
        'id_usuario'
    ];

    protected $hidden = [
        'id'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'id', 'id_usuario');
    }

    public function book(): BelongsTo {
        return $this->belongsTo(Book::class, 'id_libro', 'id');
    }
}
