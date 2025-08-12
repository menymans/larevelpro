<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favoritos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            background-color: #37474F;
            color: #fff;
            font-family: 'Cinematic', sans-serif;
        }
        .container {
            display: flex;
            width: 100%;
        }
        .sidebar {
            width: 250px;
            padding: 20px;
            background-color: #1A237E;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .sidebar h2, .sidebar ul, .sidebar .user-info {
            color: #fff;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            margin: 10px 0;
        }
        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
        }
        .sidebar ul li a:hover {
            color: #d40000;
        }
        .btn-logout {
            background-color: #d40000;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            width: 100%;
            text-align: center;
        }
        .btn-logout:hover {
            background-color: #ff0000;
        }
        .main-content {
            flex: 1;
            padding: 20px;
            background-image: url('tv.jpg');
            background-size: cover;
            background-position: center;
        }
        h1 {
            font-size: 36px;
        }
        .movies {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }
        .movie {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
        .movie img.poster {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        .btn-view-detail {
            display: inline-block;
            margin-top: 10px;
            background-color: blue;
            border-color: #1A237E;
            color: #fff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-view-detail:hover {
            background-color: #d40000;
            border-color: #d40000;
        }
    </style>
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
            <h1>Favoritos</h1>

            <!-- Lista de películas favoritas -->
            <div class="movies">
                @forelse ($favorites as $movie)
                    <div class="movie">
                        <img src="{{ asset('storage/posters/' . basename($movie->poster)) }}" alt="{{ $movie->title }}" class="poster">
                        <h2>{{ $movie->title }}</h2>
                        <p>{{ $movie->description }}</p>
                        <p><strong>Género:</strong> {{ $movie->genre }}</p>
                        <p><strong>Director:</strong> {{ $movie->director }}</p>
                        <p><strong>Fecha de Estreno:</strong> {{ $movie->release_date }}</p>
                        <!-- Botón de Ver Detalle -->
                        <a href="{{ route('movies.show', $movie->id) }}" class="btn-view-detail">Ver Detalle</a>
                    </div>
                @empty
                    <p>No tienes películas en tu lista de favoritos.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional for certain components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
