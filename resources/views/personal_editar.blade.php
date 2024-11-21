<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href=" {{ asset('css/estilos.css') }}">
        <title>Editar Personal</title>
        

        <body>
        <h1>Editar Personal</h1>
        <center>
<form action="{{ route('personal_actualizar', $personal->id_personal) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre', $personal->nombre) }}" required>
    </div>
    <div>
        <label for="app">Apellido Paterno:</label>
        <input type="text" name="app" value="{{ old('app', $personal->app) }}" required>
    </div>
    <div>
        <label for="apm">Apellido Materno:</label>
        <input type="text" name="apm" value="{{ old('apm', $personal->apm) }}" required>
    </div>
    <div>
        <label for="telefono">Telefono:</label>
        <input type="tel" name="telefono" value="{{ old('telefono', $personal->telefono) }}" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email', $personal->email) }}" required>
    </div>
    <div>
        <label for="curp">CURP:</label>
        <input type="text" name="curp" value="{{ old('curp', $personal->curp) }}" required>
    </div>
    <div>
        <label for="rfc">RFC:</label>
        <input type="text" name="rfc" value="{{ old('rfc', $personal->rfc) }}" required>
    </div>
    <div>
        <label for="cargo">Cargo:</label>
        <input type="text" name="cargo" value="{{ old('cargo', $personal->cargo) }}" required>
    </div>
    <div>
        <label for="floatingfoto">Foto:</label>
        <input type="file" name="foto">
        <img src="{{ asset('storage_path/'.$personal->foto) }}" style="width: 30px; height: 30px;">
    </div>
    <button type="submit">Actualizar</button>
    <a href="{{ route('personal') }}">
<button type="button" class="btn btn-danger">Cancelar</button>
</a>
</form>
</center>
</body>
</html>
