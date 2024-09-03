<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BookAuthor;
use App\Models\Book;

class Author extends Model
{
    use HasFactory;

    protected $table = 'Autor';
    public $timestamps = false;

    protected $fillable = [
        'nombre'
    ];

    protected $hidden = [
        'id'
    ];

    public function books() {
        return $this->belongsToMany(Book::class, 'Libro_Autor', 'id_autor', 'id_libro');
    } 
}