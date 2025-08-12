<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('{{ asset('gshs.gif') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            font-family: 'Roboto', sans-serif;
            color: #ffffff;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            max-width: 1200px;
            margin: auto;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }

        .sidebar {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            color: #ffffff;
        }

        .sidebar h2, .sidebar ul li a {
            color: #ffffff;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 10px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #ffffff;
            font-weight: bold;
        }

        .sidebar ul li a:hover {
            text-decoration: underline;
            color: #d40000;
        }

        .logout form {
            display: flex;
            justify-content: center;
        }

        .main-content {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .form-container h2 {
            color: #ffffff;
        }

        .form-container input[type="text"],
        .form-container input[type="date"],
        .form-container input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ffffff;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.1);
            color: #ffffff;
        }

        .form-container button[type="submit"] {
            background-color: #d40000;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            color: #ffffff;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
        }

        .form-container button[type="submit"]:hover {
            background-color: #3399ff;
        }

        .movies {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .movie {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            color: #ffffff;
        }

        .movie img {
            max-width: 100%;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .movie h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #d40000;
        }

        .btn-view-detail {
            background-color: #3399ff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-view-detail:hover {
            background-color: #d40000;
        }

        #googlemap {
            width: 100%;
            height: 600px;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
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
            <h1>Películas</h1>

            <!-- Formulario para agregar película -->
            <div class="form-container">
                <h2>Agregar Nueva Película</h2>
                <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="title" placeholder="Título" required>
                    <input type="text" name="genre" placeholder="Género" required>
                    <input type="text" name="description" placeholder="Descripción" required>
                    <input type="text" name="director" placeholder="Director" required>
                    <input type="date" name="release_date" required>
                    <input type="file" name="poster" accept="image/*" required>
                    <button type="submit">Agregar Película</button>
                </form>            
            </div>

            <!-- Lista de películas -->
            <div class="movies">
                @forelse ($movies as $movie)
                    <div class="movie">
                        <!-- <img src="{{ asset('storage/posters/' . basename($movie->poster)) }}" alt="{{ $movie->title }}" class="poster"> -->
                        <img src="/the core.PNG" alt="{{ $movie->title }}">

                        <h2>{{ $movie->title }}</h2>
                        <p>{{ $movie->description }}</p>
                        <p><strong>Género:</strong> {{ $movie->genre }}</p>
                        <p><strong>Director:</strong> {{ $movie->director }}</p>
                        <p><strong>Fecha de Estreno:</strong> {{ $movie->release_date }}</p>
                        <a href="{{ route('movies.show', $movie->id) }}" class="btn-view-detail">Ver película</a>
                    </div>
                @empty
                    <p>No se encontraron películas.</p>
                @endforelse
            </div>


</body>
</html>
