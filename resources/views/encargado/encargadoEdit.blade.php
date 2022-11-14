<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de encargado</title>
</head>
<body>
    <h1>Formulario de encargado</h1>
    <form action="/encargado/{{$encargado->id}}" method="POST">
        @csrf
        @method('patch')
        <label for="nombre">Nombre del encargado</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') ?? $encargado->nombre }}">
        @error('nombre')
            <i>{{ $message }}</i>
        @enderror
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>