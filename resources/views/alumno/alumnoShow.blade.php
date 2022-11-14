<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar</title>
</head>
<body>
    <h1>Detalles del alumno</h1>

    <h2>{{ $alumno->nombre }}</h2>
    <h2>{{ $alumno->horasServicio }}</h2>
    <h2>{{ $alumno->laboratorio }}</h2>
    <br>
    <a href="/alumno">Regresar al listado</a>
</body>
</html>