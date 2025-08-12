<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas - {{ $genre }}</title>
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
                <li><a href="{{ route('genres.index') }}">Géneros</a></li>
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
            <h1>Películas del Género: {{ $genre }}</h1>
            <div class="movies">
                @forelse ($movies as $movie)
                    <div class="movie">
                        <img src="{{ asset('storage/posters/' . basename($movie->poster)) }}" alt="{{ $movie->title }}" class="poster">
                        <h2>{{ $movie->title }}</h2>
                        <p>{{ $movie->description }}</p>
                        <p><strong>Director:</strong> {{ $movie->director }}</p>
                        <p><strong>Fecha de Estreno:</strong> {{ $movie->release_date }}</p>
                        <a href="{{ route('movies.show', $movie->id) }}" class="btn-view-detail">Ver Detalle</a>
                    </div>
                @empty
                    <p>No se encontraron películas para este género.</p>
                @endforelse
            </div>
        </div>
    </div>
</body>
</html>
