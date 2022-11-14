<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de materiales</title>
</head>
<body>
    <h1>Listado de materiales registrados</h1>

    <a href="/objeto/create">Ir a formulario</a>

    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Cantidad</th>
            <th>Fecha de Creación</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        @foreach ($objetos as $objeto)
            <tr>
                <td>
                    <a href="/objeto/{{ $objeto->id }}">{{ $objeto->nombre }}</a>
                </td>
                <td>
                    <a href="/objeto/{{ $objeto->id }}">{{ $objeto->tipo }}</a>
                </td>
                <td>
                    <a href="/objeto/{{ $objeto->id }}">{{ $objeto->cantidad }}</a>
                </td>
                <td>
                    <a href="/objeto/{{ $objeto->id }}">{{ $objeto->fechacreacion }}</a>
                </td>

                <td>
                    <a href="/objeto/{{ $objeto->id }}/edit">Editar</a>
                </td>
                <td>
                    <form action="/objeto/{{ $objeto->id }}" method="POST">
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