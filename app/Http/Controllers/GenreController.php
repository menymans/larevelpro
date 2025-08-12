<?php

// app/Http/Controllers/GenreController.php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Novel;
use App\Models\Series; // Asegúrate de usar la clase correcta
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        // Obtener todos los géneros únicos de películas, novelas y series
        $movieGenres = Movie::distinct()->pluck('genre');
        $novelGenres = Novel::distinct()->pluck('genre');
        $seriesGenres = Series::distinct()->pluck('genre'); // Cambiado de Serie a Series

        return view('genres.index', [
            'movieGenres' => $movieGenres,
            'novelGenres' => $novelGenres,
            'seriesGenres' => $seriesGenres
        ]);
    }

    public function show($genre)
    {
        // Obtener todas las películas, novelas y series de un género específico
        $movies = Movie::where('genre', $genre)->get();
        $novels = Novel::where('genre', $genre)->get();
        $series = Series::where('genre', $genre)->get();

        return view('genres.show', compact('genre', 'movies', 'novels', 'series'));
    }

    public function allGenres()
    {
        // Obtener todos los géneros de películas, novelas y series
        $movieGenres = Movie::select('genre')->distinct()->get()->pluck('genre');
        $novelGenres = Novel::select('genre')->distinct()->get()->pluck('genre');
        $seriesGenres = Series::select('genre')->distinct()->get()->pluck('genre');

        // Combinar y eliminar duplicados
        $allGenres = $movieGenres->merge($novelGenres)->merge($seriesGenres)->unique();

        return view('genres.all', compact('allGenres'));
    }
}
