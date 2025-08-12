<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Series::all(); // Obtiene todas las series de la base de datos
        return view('series.index', compact('series'));
    }

    public function indexByGenre($genre)
    {
        $series = Series::where('genre', $genre)->get();
        return view('series.index', compact('series'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $series = Series::where('title', 'like', "%{$query}%")
                        ->orWhere('description', 'like', "%{$query}%")
                        ->get();
        return view('series.index', compact('series', 'query'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'description' => 'required|string',
            'creator' => 'required|string|max:255',
            'release_date' => 'required|date',
            'cover' => 'required|image'
        ]);

        $coverPath = $request->file('cover')->store('covers');

        Series::create([
            'title' => $request->input('title'),
            'genre' => $request->input('genre'),
            'description' => $request->input('description'),
            'creator' => $request->input('creator'),
            'release_date' => $request->input('release_date'),
            'cover' => $coverPath
        ]);

        return redirect()->route('series.index');
    }

    public function show($id)
    {
        $series = Series::findOrFail($id);
        return view('series.show', compact('series'));
    }
}
