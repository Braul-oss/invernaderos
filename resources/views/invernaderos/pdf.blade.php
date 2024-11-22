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
                <th>Tipo</th>
                <th>Descripción</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invernadero as $invernaderos)
            <tr>
                <td>{{ $invernaderos->id_invernadero }}</td>
                <td>
                    <img src="{{ public_path('img/' . $invernaderos->imagen) }}" alt="Foto" width="50">
                </td>
                <td>{{ $invernaderos->tipo }}</td>
                <td>{{ $invernaderos->descripcion }}</td>
                <td>{{ $invernaderos->precio }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </table>
</body>
</html>