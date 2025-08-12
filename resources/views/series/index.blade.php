<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Series</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <div class="container">
        <h1>Series</h1>
        <div class="search-container">
            <form action="{{ route('series.search') }}" method="GET">
                <input type="text" name="query" placeholder="Buscar series..." value="{{ $query ?? '' }}">
                <button type="submit">Buscar</button>
            </form>
        </div>
        
        <!-- Formulario para agregar serie -->
        <div class="form-container">
            <h2>Agregar Nueva Serie</h2>
            <form action="{{ route('series.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="title" placeholder="Título" required>
                <input type="text" name="genre" placeholder="Género" required>
                <input type="text" name="description" placeholder="Descripción" required>
                <input type="text" name="creator" placeholder="Creador" required>
                <input type="date" name="release_date" required>
                <input type="file" name="cover" accept="image/*" required>
                <button type="submit">Agregar Serie</button>
            </form>            
        </div>

        <!-- Lista de series -->
        <div class="series">
            @forelse ($series as $serie)
                <a href="{{ route('series.show', $serie->id) }}" class="serie">
                    <img src="{{ asset('storage/covers/' . basename($serie->cover)) }}" alt="{{ $serie->title }}" class="cover">
                    <h2>{{ $serie->title }}</h2>
                    <p>{{ $serie->description }}</p>
                    <p><strong>Género:</strong> {{ $serie->genre }}</p>
                    <p><strong>Creador:</strong> {{ $serie->creator }}</p>
                    <p><strong>Fecha de Estreno:</strong> {{ $serie->release_date }}</p>
                </a>
            @empty
                <p>No se encontraron series.</p>
            @endforelse
        </div>
    </div>
</body>
</html>
