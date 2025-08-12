<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">

    <style>
        body {
            background-image: url('{{ asset('deadpool.jpg') }}');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        form {
            background: rgba(255, 255, 255, 0.8); /* Fondo blanco semi-transparente */
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3); /* Sombra para profundidad */
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }

        input[type=text], input[type=email], input[type=password] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s, border-color 0.3s;
        }

        input[type=text]:focus, input[type=email]:focus, input[type=password]:focus {
            border-color: #FF6347; /* Color de borde al enfocar */
            box-shadow: 0 0 8px rgba(255, 99, 71, 0.5); /* Brillo al enfocar */
        }

        button {
            background-color: #FF6347; /* Color de fondo brillante */
            color: white;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        button:hover {
            background-color: #FF4500; /* Color al pasar el ratón sobre el botón */
            box-shadow: 0 0 8px rgba(255, 99, 71, 0.7); /* Brillo al pasar el ratón */
        }

        div {
            color: #FF6347; /* Color para mensajes de error */
            margin-top: 10px;
        }

        @media (max-width: 600px) {
            form {
                width: 90%;
            }
        }
    </style>

</head>
<body>
    <form method="POST" action="{{ url('register') }}">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        @error('name')
            <div>{{ $message }}</div>
        @enderror

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        @error('email')
            <div>{{ $message }}</div>
        @enderror

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        @error('password')
            <div>{{ $message }}</div>
        @enderror

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>

        <button type="submit">Register</button>
    </form>
</body>
</html>
