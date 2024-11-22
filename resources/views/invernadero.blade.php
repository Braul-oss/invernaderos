<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href=" {{ asset('css/estilos.css') }}">
        <title>Lista de invernadero</title>
        

        <body>
        <div id="encabezado">
        <a href="{{ route('panel_admin') }}">
        <img src="{{ 'img/dino.jpg' }}" alt="logo empresa" id="imgenbn">
        </a>
        <nav class="menu">
            <ul>
                <li><form action="{{ route('logout') }}" method="POST" class="cierre">
                    @csrf
                    <button type="submit" class="cierre">Cerrar sesión</button>
                </form></li>	
                <center>
                <li> <a href="">Bienvenido:  </a></li>   
                </center>
		    	<li class="desp">
                    <a href="javascript:void(0)" class="menu">Administración de catalogos</a>
                    <div class="cont_cj">
                        <a href="adminis.php">Cliente</a>
                        <a href="adminisfr.php">Fertilizante</a>
                        <a href="{{ route('herramientas') }}">Herramienta</a>
                        <a href="{{ route('invernadero') }}">Tipo de invernadero</a>
                        <a href="{{ route('personal') }}">Personal</a>
                        <a href="{{ route('planta') }}">Plantas</a>
                    </div>
                </li> 
		    </ul>
        </nav>
    </div>
    <br>
        <div style=" float: inline-start; position: relative;  width: 100%; height: 250px; padding: 2px;">
<div class="container">
<form action="{{ route('invernadero') }}" method="GET" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-floating mb-3">
                <input type="input" class="form-control" name="buscar" value="{{ old('buscar') }}" id="floatingBuscar" 
                    placeholder="ejemplo: Flor de cerezo" aria-describedby="buscarHelp">
                <div id="buscarHelp" class="form-text">@if($errors->first('buscar')) <i>El campo Buscar no es correcto!!!</i> @endif</div>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
            <a href="{{ route('invernadero') }}">
                <button type="button" class="btn btn-danger">Reiniciar</button>
            </a>
        </form>
    <br>
    <h3>Administración de registro de invernaderos</h3>
    <h5>Tabla de registro</h5>
    <hr>

    <p style="text-align: right;">
        <a href="{{ route('invernadero.pdf', ['buscar' => request('buscar')]) }}" class="boton">PDF</a>
        <a href="{{ route('invernadero_alta') }}" class="boton">Nuevo registro</a>
    </p>
    
<hr><br>
<table class="table">
    <tr>
        <th>Foto</th>
        <th>N°</th>
        <th>Tipo</th>
        <th>Descripción</th>
        <th>Editar</th>
        <th>Eliminar</th>
    
</tr>
@foreach($invernadero as $key=>$invernaderos)
<tr>
    <td><img src="{{ 'img/' . $invernaderos->imagen }}" style="width: 30px; height: 30px;"></td>
    <td>{{ $invernaderos->id_invernadero }}</td>
    <td>{{ $invernaderos->tipo }}</td>
    <td>{{ $invernaderos->descripcion }}</td>
    <td><a href="{{ route('invernadero_editar', $invernaderos->id_invernadero) }}">
            <button type="button" class="boton2">Editar</button>
</a></td>
<td><a href="{{ route('invernadero_borrar', $invernaderos->id_invernadero) }}">
            <button type="button" class="boton2">Eliminar</button>
</a></td>
<td><a href="{{ route('invernadero_detalle', $invernaderos->id_invernadero) }}">
            <button type="button" class="boton2">Consultar</button>
</a></td>
</tr>
@endforeach
</table>

<div class="pagination pagination-sm">
            {{ $invernadero->links('pagination::bootstrap-5') }}
</div>

</div>
</body>
</html>