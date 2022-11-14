<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de material</title>
</head>
<body>
    <h1>Formulario de material</h1>
    <form action="/objeto/{{$objeto->id}}" method="POST">
        @csrf
        @method('patch')
        <label for="nombre">Nombre del Material</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') ?? $objeto->nombre }}">
        @error('nombre')
            <i>{{ $message }}</i>
        @enderror
        <br>

        <label for="tipo">Tipo de Material</label>
        <select type="text" name="tipo" id="tipo" value="{{ old('tipo') ?? $objeto->material }}"
        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                  <option>Reactivo</option>
                  <option>Sustancia</option>
                  <option>Instrumento</option>
        </select>
        @error('tipo')
            <i>{{ $message }}</i>
        @enderror
        <br>

        <label for="cantidad">Cantidad</label>
        <input type="text" name="cantidad" id="cantidad" value="{{ old('cantidad') ?? $objeto->cantidad }}">
        @error('cantidad')
            <i>{{ $message }}</i>
        @enderror
        <br>

        <label for="fechacreacion">Fecha de creación</label>
        <input type="text" name="fechacreacion" id="fechacreacion" value="{{ old('fechacreacion') ?? $objeto->fechacreacion }}">
        @error('fechacreacion')
            <i>{{ $message }}</i>
        @enderror
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>