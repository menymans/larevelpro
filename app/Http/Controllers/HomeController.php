<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class HomeController extends Controller
{
    // El método __invoke maneja la ruta '/'
    public function __invoke()
    {
        return view('welcome');
    }

    public function index()
    {
        $movies = Movie::all();
        return view('home', compact('movies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'description' => 'required|string',
            'director' => 'required|string|max:255',
            'release_date' => 'required|date',
            'poster' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $posterPath = $request->file('poster')->store('posters', 'public');

        Movie::create([
            'title' => $request->input('title'),
            'genre' => $request->input('genre'),
            'description' => $request->input('description'),
            'director' => $request->input('director'),
            'release_date' => $request->input('release_date'),
            'poster' => Storage::url($posterPath),
        ]);

        return redirect()->route('home')->with('success', 'Película agregada exitosamente!');
    }
}

