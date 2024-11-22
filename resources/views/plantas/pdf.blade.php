<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Plantas</title>
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
<h3>Lista de Plantas</h3>
    <table>
    <thead>
            <tr>
                <th>N°</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Descripción</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($planta as $plantas)
            <tr>
                <td>{{ $plantas->id_planta }}</td>
                <td>
                    <img src="{{ public_path('img/' . $plantas->imagen) }}" alt="Foto" width="50">
                </td>
                <td>{{ $plantas->nombre }}</td>
                <td>{{ $plantas->tipo }}</td>
                <td>{{ $plantas->descripcion }}</td>
                <td>{{ $plantas->precio }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </table>
</body>
</html>