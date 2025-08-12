<!-- resources/views/genres/index.blade.php -->
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
                <li><a href="{{ route('novels.index') }}">Novelas</a></li>
                <li><a href="{{ route('series.index') }}">Series</a></li>
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
            <h1>Géneros</h1>
            <div class="genres">
                <h2>Películas</h2>
                <ul>
                    @forelse ($movieGenres as $genre)
                        <li><a href="{{ route('movies.indexByGenre', ['genre' => $genre]) }}">{{ $genre }}</a></li>
                    @empty
                        <li>No hay géneros de películas.</li>
                    @endforelse
                </ul>

                <h2>Novelas</h2>
                <ul>
                    @forelse ($novelGenres as $genre)
                        <li><a href="{{ route('novels.indexByGenre', ['genre' => $genre]) }}">{{ $genre }}</a></li>
                    @empty
                        <li>No hay géneros de novelas.</li>
                    @endforelse
                </ul>

                <h2>Series</h2>
                <ul>
                    @forelse ($seriesGenres as $genre)
                        <li><a href="{{ route('series.indexByGenre', ['genre' => $genre]) }}">{{ $genre }}</a></li>
                    @empty
                        <li>No hay géneros de series.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
