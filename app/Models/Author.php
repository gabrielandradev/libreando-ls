<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}