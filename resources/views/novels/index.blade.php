<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novelas</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <div class="container">
        <!-- Panel lateral izquierdo -->
        <div class="sidebar">
            <div class="user-info">
                <h2>Hola, {{ auth()->user()->name }}</h2>
            </div>
            
            <div class="categories">
                <h3>Categorías</h3>
                <ul>
                    <li><a href="{{ route('home') }}">Inicio</a></li>
                    <li><a href="{{ route('novels.index') }}">Novelas</a></li>
                    <li><a href="{{ route('genres.novelindex') }}">Géneros</a></li>
                    <li><a href="{{ route('favorites.novelindex') }}">Favoritos</a></li>
                </ul>
            </div>

            <div class="logout">
                <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres cerrar sesión?');">
                    @csrf
                    <button type="submit" class="btn-logout">Cerrar Sesión</button>
                </form>
            </div>
        </div>

        <!-- Contenido principal -->
        <div class="main-content">
            <h1>Novelas</h1>
            <div class="search-container">
                <form action="{{ route('novels.search') }}" method="GET">
                    <input type="text" name="query" placeholder="Buscar novelas..." value="{{ request('query') }}">
                    <button type="submit">Buscar</button>
                </form>
            </div>
            
            <!-- Formulario para agregar novela -->
            <div class="form-container">
                <h2>Agregar Nueva Novela</h2>
                <form action="{{ route('novels.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="title" placeholder="Título" required>
                    <input type="text" name="genre" placeholder="Género" required>
                    <input type="text" name="description" placeholder="Descripción" required>
                    <input type="text" name="author" placeholder="Autor" required>
                    <input type="date" name="release_date" required>
                    <input type="file" name="cover" accept="image/*" required>
                    <button type="submit">Agregar Novela</button>
                </form>            
            </div>

            <!-- Lista de novelas -->
            <div class="novels">
                @forelse ($novels as $novel)
                    <a href="{{ route('novels.show', $novel->id) }}" class="novel">
                        <img src="{{ asset('storage/covers/' . basename($novel->cover)) }}" alt="{{ $novel->title }}" class="cover">
                        <h2>{{ $novel->title }}</h2>
                        <p>{{ $novel->description }}</p>
                        <p><strong>Género:</strong> {{ $novel->genre }}</p>
                        <p><strong>Autor:</strong> {{ $novel->author }}</p>
                        <p><strong>Fecha de Publicación:</strong> {{ $novel->release_date }}</p>
                    </a>
                @empty
                    <p>No se encontraron novelas.</p>
                @endforelse
            </div>
        </div>
    </div>
</body>
</html>
