<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Alumno</title>
</head>
<body>
    <h1>Formulario de Alumno</h1>
    @if ($errors->any()) 
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/alumno/{{$alumno->id}}" method="POST">
    @csrf
    @method('patch')
        <label for="nombre">Nombre del alumno</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') ?? $alumno->nombre}}">
      
        <br>
        <label for="horasServicio">Horas de Servicio</label>
        <input type="text" name="horasServicio" id="horasServicio" value="{{ old('horasServicio') ?? $alumno->horasServicio}}">
      
        <br>
        <label for="laboratorio">Laboratorio asignado</label>
        <input type="text" name="laboratorio" id="laboratorio" value="{{ old('laboratorio') ?? $alumno->laboratorio }}">
       
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>


