<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Almacen</title>
</head>
<body>
    <h1>Formulario de Almacen</h1>
    @if ($errors->any()) 
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="/almacen" method="POST">
        @csrf
        <label for="nombre">Nombre del almacen</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}">
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
