<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

        // Definir la relación con el modelo Genre
        public function genre()
        {
            return $this->belongsTo(Genre::class, 'genre_id'); // Asegúrate de que 'genre_id' sea el nombre correcto de la clave foránea en la tabla 'movies'
        }
        
    protected $fillable = ['title', 'genre', 'description', 'director', 'release_date', 'poster'];
}
