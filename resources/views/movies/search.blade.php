<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda - Películas</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <div class="container">
        <h1>Resultados de Búsqueda</h1>
        <div class="search-container">
            <form action="{{ route('movies.search') }}" method="GET">
                <input type="text" name="query" placeholder="Buscar películas..." value="{{ request('query') }}">
                <button type="submit">Buscar</button>
            </form>
        </div>

        <!-- Lista de películas -->
        <div class="movies">
            @forelse ($movies as $movie)
                <a href="{{ route('movies.show', $movie->id) }}" class="movie">
                    <img src="{{ asset('storage/posters/' . basename($movie->poster)) }}" alt="{{ $movie->title }}" class="poster">
                    <h2>{{ $movie->title }}</h2>
                    <p>{{ $movie->description }}</p>
                    <p><strong>Género:</strong> {{ $movie->genre }}</p>
                    <p><strong>Director:</strong> {{ $movie->director }}</p>
                    <p><strong>Fecha de Estreno:</strong> {{ $movie->release_date }}</p>
                </a>
            @empty
                <p>No se encontraron películas que coincidan con "{{ request('query') }}"</p>
            @endforelse
        </div>
    </div>
</body>
</html>
