<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Invernaderos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h3>Lista de Invernaderos</h3>
    <table>
    <thead>
            <tr>
                <th>N°</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($herramienta as $herramientas)
            <tr>
                <td>{{ $herramientas->id_herramienta }}</td>
                <td>
                    <img src="{{ public_path('img/' . $herramientas->imagen) }}" alt="Foto" width="50">
                </td>
                <td>{{ $herramientas->nombre }}</td>
                <td>{{ $herramientas->descripcion }}</td>
                <td>{{ $herramientas->precio }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </table>
</body>
</html>