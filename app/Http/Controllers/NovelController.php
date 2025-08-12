<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Novel;

class NovelController extends Controller
{
    public function index()
    {
        $novels = Novel::all(); // Obtiene todas las novelas de la base de datos
        return view('novels.index', compact('novels'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $novels = Novel::where('title', 'like', "%{$query}%")
                        ->orWhere('description', 'like', "%{$query}%")
                        ->get();
        return view('novels.index', compact('novels', 'query'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'description' => 'required|string',
            'author' => 'required|string|max:255',
            'release_date' => 'required|date',
            'cover' => 'required|image'
        ]);

        $coverPath = $request->file('cover')->store('covers');

        Novel::create([
            'title' => $request->input('title'),
            'genre' => $request->input('genre'),
            'description' => $request->input('description'),
            'author' => $request->input('author'),
            'release_date' => $request->input('release_date'),
            'cover' => $coverPath
        ]);

        return redirect()->route('novels.index');
    }

    public function show($id)
    {
        $novel = Novel::findOrFail($id);
        return view('novels.show', compact('novel'));
    }

    public function indexByGenre($genre)
    {
        $novels = Novel::where('genre', $genre)->get();
        return view('novels.index', compact('novels'));
    }
}
