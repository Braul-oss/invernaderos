<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href=" {{ asset('css/estilos.css') }}">
        <title>Detalle Personal</title>
        

        <body>
<h1>Detalles del Personal</h1>
<center>
    <p><strong>ID:</strong> {{ $personal->id_personal }}</p>
    <p><strong>Nombre:</strong> {{ $personal->nombre }}</p>
    <p><strong>Apellido Paterno:</strong> {{ $personal->app }}</p>
    <p><strong>Apellido Materno:</strong> {{ $personal->apm }}</p>
    <p><strong>Telefono:</strong> {{ $personal->telefono }}</p>
    <p><strong>Email:</strong> {{ $personal->email }}</p>
    <p><strong>CURP:</strong> {{ $personal->curp }}</p>
    <p><strong>RFC:</strong> {{ $personal->rfc }}</p>
    <p><strong>Cargo:</strong> {{ $personal->cargo }}</p>
    <p><strong>Foto:</strong></p>
    <img src="{{ url('img/'.$personal->foto) }}" alt="Foto del personal" style="width: 150px;">
    <hr>
    <a href="{{ route('personal') }}">
<button type="button" class="btn btn-danger">Regresar</button>
</a>
    </center>
    </body>
    </html>