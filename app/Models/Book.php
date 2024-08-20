<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Book extends Authenticatable
{
    use HasFactory;

    protected $table = 'CAMBIAME';
    public $timestamps = false;

    protected $fillable = [

    ];

    protected $hidden = [
        
    ];
}
