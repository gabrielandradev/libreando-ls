<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    use HasFactory;

    protected $table = 'Libro_Autor';
    public $timestamps = false;

    protected $fillable = [
        'id_libro',
        'id_autor'
    ];
}
