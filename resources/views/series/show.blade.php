<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $series->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <div class="container">
        <h1>{{ $series->title }}</h1>

        <div class="series-detail">
            <img src="{{ asset('storage/' . basename($series->cover)) }}" alt="{{ $series->title }}" class="cover">
            <p><strong>Género:</strong> {{ $series->genre }}</p>
            <p><strong>Descripción:</strong> {{ $series->description }}</p>
            <p><strong>Creador:</strong> {{ $series->creator }}</p>
            <p><strong>Fecha de Estreno:</strong> {{ $series->release_date }}</p>

            <!-- Botón de eliminar -->
            <form action="{{ route('series.destroy', $series->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta serie?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete">Eliminar Serie</button>
            </form>
        </div>
    </div>
</body>
</html>
