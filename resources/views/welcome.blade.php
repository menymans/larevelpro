<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a CineWeb</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
        }
        .left, .right {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .left {
            background-image: url('fondo.jpg');
            color: #fff;
        }
        .right {
            background-image: url('pppp.jpg');
            background-size: cover;
            background-position: center;
        }
        .btn-custom {
            background-color: blue;
            border-color: #1A237E;
            color: #fff;
        }
        .btn-custom:hover {
            background-color: #d40000;
            border-color: #d40000;
        }
        .content {
            padding: 40px;
            text-align: center;
            background-color: #37474F;
            border-radius: 10px;
        }
        h1 {
            font-family: 'Cinematic', sans-serif;
            font-size: 36px;
        }
        p {
            font-family: 'Cinematic', sans-serif;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="left">
        <div class="content">
            <h1>Bienvenido a CineWeb</h1>
            <p>Por favor, escoge una opción:</p>
            <div class="d-grid gap-2">
                <a href="{{ route('login') }}" class="btn btn-custom btn-lg">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="btn btn-custom btn-lg">Registrar</a>
            </div>
        </div>
    </div>
    <div class="right">
        <!-- Imagen de fondo en la columna derecha -->
    </div>

    <!-- Bootstrap JS (Optional for certain components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>