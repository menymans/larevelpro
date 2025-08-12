<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    use HasFactory;

    // Definir la tabla asociada al modelo
    protected $table = 'novelas';

    // Definir los campos que se pueden llenar masivamente
    protected $fillable = [
        'title',
        'genre',
        'description',
        'author',
        'release_date',
        'cover'
    ];

    // Si deseas usar timestamps
    public $timestamps = true;
}
