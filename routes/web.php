<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\NovelController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CategoryController;

// Vista principal
Route::get('/', HomeController::class);

// Vista Registro
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Vista Home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Vista Login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Rutas para Movies
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/genre/{genre}', [MovieController::class, 'indexByGenre'])->name('movies.indexByGenre');
Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');
Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');

// Rutas para Series
Route::get('/series', [SeriesController::class, 'index'])->name('series.index');
Route::get('/series/search', [SeriesController::class, 'search'])->name('series.search');
Route::post('/series', [SeriesController::class, 'store'])->name('series.store');
Route::get('/series/{id}', [SeriesController::class, 'show'])->name('series.show');
Route::delete('/series/{id}', [SeriesController::class, 'destroy'])->name('series.destroy');
Route::get('/series/genre/{genre}', [SeriesController::class, 'indexByGenre'])->name('series.indexByGenre');

// Rutas para Novelas
Route::get('/novels', [NovelController::class, 'index'])->name('novels.index');
Route::get('/novels/search', [NovelController::class, 'search'])->name('novels.search');
Route::post('/novels', [NovelController::class, 'store'])->name('novels.store');
Route::get('/novels/{id}', [NovelController::class, 'show'])->name('novels.show');
Route::get('/novels/genre/{genre}', [NovelController::class, 'indexByGenre'])->name('novels.indexByGenre');

// Rutas para Géneros
Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
Route::get('/genres/{genre}', [GenreController::class, 'show'])->name('genres.show');
Route::get('/genres/all', [GenreController::class, 'allGenres'])->name('genres.allindex');


// Ruta para ver todos los géneros de películas, novelas y series
Route::get('/genres/all', [GenreController::class, 'allGenres'])->name('genres.allindex');

// Rutas para Favoritos
Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');

// Rutas para Categorías
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

// Ruta para ver novelas por género
Route::get('/genres/novels/{genre}', [GenreController::class, 'novelsByGenre'])->name('genres.novelsByGenre');
