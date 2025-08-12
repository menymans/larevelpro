<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('{{ asset('home.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
        }

        .user-info h2, .categories h3 {
            color: #2550c4; /* Cambiado de amarillo (#f39c12) a verde (#27ae60) */
        }

        .categories ul {
            list-style: none;
            padding: 0;
        }

        .categories ul li a {
            color: #ecf0f1;
            text-decoration: none;
            padding: 10px 0;
            display: block;
            border-bottom: 1px solid #444;
        }

        .categories ul li a:hover {
            background-color: #2550c4; /* Cambiado de amarillo (#f39c12) a verde (#27ae60) */
            color: #000;
        }

        .btn-logout {
            width: 100%;
            padding: 10px;
            background-color: #3498db; /* Cambiado de rojo (#e74c3c) a azul (#3498db) */
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-logout:hover {
            background-color: #2980b9; /* Cambiado de rojo oscuro (#c0392b) a azul oscuro (#2980b9) */
        }

        .main-content {
            flex: 1;
            padding: 40px;
            background-color: rgba(0, 0, 0, 0.5);
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #2550c4; /* Cambiado de amarillo (#f39c12) a verde (#27ae60) */
        }

        p {
            font-size: 18px;
            margin-bottom: 30px;
        }

        .quick-links {
            margin-top: 30px;
        }

        .quick-links .links {
            display: flex;
            justify-content: space-between;
        }

        .quick-links .link {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            width: 30%;
            text-align: center;
            color: #fff;
            text-decoration: none;
            border: 1px solid #444;
        }

        .quick-links .link:hover {
            background-color: rgba(255, 255, 255, 0.3);
            color: #000;
        }

        .updates {
            margin-top: 50px;
        }

        .updates h2 {
            color: #000;
        }

        hr {
            border-color: #2550c4; /* Cambiado de amarillo (#f39c12) a verde (#27ae60) */
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Panel lateral izquierdo -->
        <div class="sidebar">
            <div class="user-info">
                <h2>Hola, {{ auth()->user()->name }}</h2>
            </div>
            
            <div class="categories">
                <hr>
                <h3>CATEGORIAS</h3>
                <ul>
                    <li><a href="{{ route('novels.index') }}">Novelas</a></li>
                    <li><a href="{{ route('movies.index') }}">Películas</a></li>
                    <li><a href="{{ route('series.index') }}">Series</a></li>
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
            <h1>Bienvenido a la Página de Películas</h1>
            <p>Explora una vasta colección de películas, administra tus favoritos, y descubre nuevos géneros y categorías.</p>

            <!-- Accesos Rápidos -->
            <div class="quick-links">
                <h2>Accesos Rápidos</h2>
                <div class="links">
                    <a href="{{ route('movies.index') }}" class="link">
                        <h3>Explorar Películas</h3>
                        <p>Descubre nuestra colección de películas.</p>
                    </a>
                    <a href="{{ route('genres.allindex') }}" class="link">
                        <h3>Ver Géneros</h3>
                        <p>Encuentra películas por género.</p>
                    </a>
                    <a href="{{ route('favorites.index') }}" class="link">
                        <h3>Mis Favoritos</h3>
                        <p>Revisa y administra tus películas favoritas.</p>
                    </a>
                </div>
            </div>

            <!-- Noticias o Actualizaciones (opcional) -->
            <div class="updates">
                
                
            </div>
        </div>
    </div>
</body>
</html>