<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Fertiilizantes</title>
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
<h3>Lista de Fertilizantes</h3>
    <table>
    <thead>
            <tr>
                <th>N°</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fertilizante as $fertilizantes)
            <tr>
                <td>{{ $fertilizantes->id_fertilizante }}</td>
                <td>
                    <img src="{{ public_path('img/' . $fertilizantes->imagen) }}" alt="Foto" width="50">
                </td>
                <td>{{ $fertilizantes->nombre }}</td>
                <td>{{ $fertilizantes->descripcion }}</td>
                <td>{{ $fertilizantes->precio }}</td>
                <td>{{ $fertilizantes->stock }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </table>
</body>
</html>