<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href=" {{ asset('css/estilos.css') }}">
        <title>Editar Planta</title>
        

        <body>
        <h1>Editar Planta</h1>
        <center>
<form action="{{ route('planta_actualizar', $planta->id_planta) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre', $planta->nombre) }}" required>
    </div>
    <div>
        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" value="{{ old('tipo', $planta->tipo) }}" required>
    </div>
    <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" class="form-control" required>{{ $planta->descripcion }}</textarea>
            </div>
    <div>
        <label for="precio">Precio:</label>
        <input type="number" name="precio" value="{{ old('precio', $planta->precio) }}" required>
    </div>
    <div>
        <label for="stock">Stock:</label>
        <input type="number" name="stock" value="{{ old('stock', $planta->stock) }}" required>
    </div>
    <div>
        <label for="floatingimagen">Imagen:</label>
        <input type="file" name="imagen">
        <img src="{{ asset('storage_path/'.$planta->imagen) }}" style="width: 30px; height: 30px;">
    </div>
    <button type="submit">Actualizar</button>
    <a href="{{ route('planta') }}">
<button type="button" class="btn btn-danger">Cancelar</button>
</a>
</form>
</center>
</body>
</html>

