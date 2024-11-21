<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Personal</title>
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
<h3>Lista de Personal</h3>
    <table>
    <thead>
            <tr>
                <th>Foto</th>
                <th>N°</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Teléfono</th>
                <th>RFC</th>
                <th>Cargo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($personal as $personales)
            <tr>
                <td>
                    <img src="{{ public_path('img/' . $personales->foto) }}" alt="Foto" width="50">
                </td>
                <td>{{ $personales->id_personal }}</td>
                <td>{{ $personales->nombre }}</td>
                <td>{{ $personales->app }}</td>
                <td>{{ $personales->apm }}</td>
                <td>{{ $personales->telefono }}</td>
                <td>{{ $personales->rfc}}</td>
                <td>{{ $personales->cargo}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </table>
</body>
</html>