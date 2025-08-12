<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Géneros</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <div class="container">
        <!-- Menú Lateral -->
        <div class="sidebar">
            <div class="user-info">
                <h2>Hola, {{ auth()->user()->name }}</h2>
            </div>
            <h2>Menú</h2>
            <ul>
                <li><a href="{{ route('home') }}">Inicio</a></li>
                <li><a href="{{ route('movies.index') }}">Películas</a></li>
                <li><a href="{{ route('series.index') }}">Series</a></li>
                <li><a href="{{ route('novels.index') }}">Novelas</a></li>
                <li><a href="{{ route('favorites.index') }}">Favoritos</a></li>
            </ul>

            <div class="logout">
                <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres cerrar sesión?');">
                    @csrf
                    <button type="submit" class="btn-logout">Cerrar Sesión</button>
                </form>
            </div>
        </div>

        <div class="main-content">
            <h1>Todos los Géneros</h1>

            <div class="genres">
                @forelse ($allGenres as $genre)
                    <div class="genre-item">
                        <a href="{{ route('movies.indexByGenre', $genre) }}" class="genre-link">Películas - {{ $genre }}</a>
                        <a href="{{ route('novels.indexByGenre', $genre) }}" class="genre-link">Novelas - {{ $genre }}</a>
                        <a href="{{ route('series.indexByGenre', $genre) }}" class="genre-link">Series - {{ $genre }}</a>
                    </div>
                @empty
                    <p>No se encontraron géneros.</p>
                @endforelse
            </div>
        </div>
    </div>
</body>
</html>
