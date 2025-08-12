<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $movie->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        body {
            background-image: url('{{ asset('gshs.gif') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.08);
            padding: 20px;
            border-radius: 10px;
            max-width: 1200px;
            margin: auto;
        }

        .sidebar {
            background-color: rgba(0, 0, 0, 0.07);
            color: white;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .main-content {
            background-color: rgba(150, 150, 150, 0.70);
            padding: 20px;
            border-radius: 10px;
            color: white;
        }

        .poster-large {
            max-width: 100%;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .btn-logout {
            background-color: #3399ff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-logout:hover {
            background-color: #da0e0e;
        }

        h1 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 10px;
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
            <h1>{{ $movie->title }}</h1>
            <img src="{{ asset('storage/posters/' . basename($movie->poster)) }}" alt="{{ $movie->title }}" class="poster-large">
            <p><strong>Género:</strong> {{ $movie->genre }}</p>
            <p><strong>Descripción:</strong> {{ $movie->description }}</p>
            <p><strong>Director:</strong> {{ $movie->director }}</p>
            <p><strong>Fecha de Estreno:</strong> {{ $movie->release_date }}</p>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/KZZ7_6Iaewk?si=xkuopEDV8WN39lUT" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                            <!-- Mapa de Google Maps -->
            <h2>La película fue grabada en Juarez, México</h2>
            <div id="googlemap"></div>
        </div>
    </div>

    <script>
        function initMap() {
            let lat = {{ $movie->latitude ?? '31.591722' }};
            let lng = {{ $movie->longitude ?? '-106.409030' }};
            
            let mapProp = {
                center: new google.maps.LatLng(lat, lng),
                zoom: 15,
            };
            
            let map = new google.maps.Map(document.getElementById('googlemap'), mapProp);
            let marker = new google.maps.Marker({
                position: new google.maps.LatLng(lat, lng),
                map: map
            });
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjRycep6EaAr9BvNvOw2kUjG0zZnzbAmk&callback=initMap" async defer></script>
        </div>
    </div>

    
</body>
</html>
