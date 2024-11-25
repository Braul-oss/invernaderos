<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href=" {{ asset('css/estilos.css') }}">
        <title>Editar fertilizante</title>
        

        <body>
        <h1>Editar Fertilizante</h1>
        <center>
<form action="{{ route('fertilizante_actualizar', $fertilizante->id_fertilizante) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre', $fertilizante->nombre) }}" required>
    </div>
    <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" class="form-control" required>{{ $fertilizante->descripcion }}</textarea>
            </div>
    <div>
        <label for="precio">Precio:</label>
        <input type="number" name="precio" value="{{ old('precio', $fertilizante->precio) }}" required>
    </div>

    <div>
        <label for="precio">Stock:</label>
        <input type="number" name="stock" value="{{ old('stock', $fertilizante->stock) }}" required>
    </div>

    <div>
        <label for="floatingimagen">Imagen:</label>
        <input type="file" name="imagen">
        <img src="{{ asset('storage_path/'.$fertilizante->imagen) }}" style="width: 30px; height: 30px;">
    </div>
    <button type="submit">Actualizar</button>
    <a href="{{ route('fertilizantes') }}">
<button type="button" class="btn btn-danger">Cancelar</button>
</a>
</form>
</center>
</body>
</html>
