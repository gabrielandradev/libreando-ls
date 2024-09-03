<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookSecondaryDesc extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'Libro_Descriptor_Secundario';
    public $timestamps = false;

    protected $fillable = [
        'id_libro',
        'id_descriptor_secundario'
    ];
}
