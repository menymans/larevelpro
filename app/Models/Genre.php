<?php

// app/Models/Genre.php

// app/Models/Genre.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    // Si la tabla se llama 'genres' en la base de datos, no es necesario definir el nombre de la tabla
    // Si no, define el nombre de la tabla
    protected $table = 'genres';

    // Definir la relación con el modelo Movie
    public function movies()
    {
        return $this->hasMany(Movie::class, 'genre_id'); // Asegúrate de que 'genre_id' sea el nombre correcto de la clave foránea en la tabla 'movies'
    }
}
