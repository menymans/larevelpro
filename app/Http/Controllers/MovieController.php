<?php

// app/Http/Controllers/MovieController.php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    // Método para mostrar todas las películas
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    // Método para mostrar películas por género
    public function indexByGenre($genre)
    {
        $movies = Movie::where('genre', $genre)->get();
        return view('movies.indexByGenre', compact('movies', 'genre'));
    }

    // Método para mostrar detalles de una película
    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movies.show', compact('movie'));
    }

    // Método para agregar una película
    public function store(Request $request)
    {
        // Validar y guardar la película
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'description' => 'required|string',
            'director' => 'required|string|max:255',
            'release_date' => 'required|date',
            'poster' => 'required|image',
        ]);

        $path = $request->file('poster')->store('posters');

        Movie::create(array_merge($validatedData, ['poster' => $path]));

        return redirect()->route('movies.index');
    }
}
