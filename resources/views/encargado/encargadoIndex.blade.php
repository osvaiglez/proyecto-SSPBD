<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de encargados</title>
</head>
<body>
    <h1>Listado de encargados registrados</h1>

    <a href="/encargado/create">Ir a formulario</a>

    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        @foreach ($encargados as $encargado)
            <tr>
                <td>
                    <a href="/encargado/{{ $encargado->id }}">{{ $encargado->nombre }}</a>
                </td>

                <td>
                    <a href="/encargado/{{ $encargado->id }}/edit">Editar</a>
                </td>
                <td>
                    <form action="/encargado/{{ $encargado->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Borrar">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <ul>
        
    </ul>
</body>
</html>