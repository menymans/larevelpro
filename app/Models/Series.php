<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    // Definir la tabla asociada al modelo
    protected $table = 'series';

    // Definir los campos que se pueden llenar masivamente
    protected $fillable = [
        'title',
        'genre',
        'description',
        'creator',
        'release_date',
        'cover'
    ];

    // Si deseas usar timestamps
    public $timestamps = true;
}
