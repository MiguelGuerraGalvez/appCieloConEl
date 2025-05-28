<!DOCTYPE html>
<html>
<head>
    <title>Página no encontrada - 404</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
    <style>
        body {
            background-color: #f2f2f2;
            color: #333;
            font-family: 'Roboto', sans-serif;
            text-align: center;
            padding-top: 100px;
        }
        h1 {
            font-size: 100px;
            margin: 0;
        }
        p {
            font-size: 20px;
            margin: 20px 0;
        }
        a {
            color: #3490dc;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>404</h1>
    <p>Lo sentimos, la página que buscas no existe.</p>
    <a href="{{ url('/principal') }}">Volver al inicio</a>
</body>
</html>
