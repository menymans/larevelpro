<?php

// app/Http/Controllers/FavoriteController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Obtener las películas favoritas del usuario
        $favorites = $user->favorites;

        // Pasar las películas favoritas a la vista
        return view('favorites.index', compact('favorites'));
    }
}
