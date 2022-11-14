<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar</title>
</head>
<body>
    <h1>Detalles del material</h1>

    <h2>{{ $objeto->nombre }}</h2>
    <h2>{{ $objeto->tipo }}</h2>
    <h2>{{ $objeto->cantidad }}</h2>
    <h2>{{ $objeto->fechacreacion }}</h2>

    <br>
    <a href="/objeto">Regresar al listado</a>
</body>
</html>