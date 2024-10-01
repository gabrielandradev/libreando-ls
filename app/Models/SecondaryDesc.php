<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondaryDesc extends Model
{
    use HasFactory;

    protected $table = 'Descriptor_Secundario';
    public $timestamps = false;

    protected $fillable = [
        'descriptor'
    ];

    protected $hidden = [
        'id'
    ];
}
