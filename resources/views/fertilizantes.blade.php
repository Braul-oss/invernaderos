<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href=" {{ asset('css/estilos.css') }}">
        <title>Lista de fertilizante</title>
        

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
<<<<<<< HEAD
=======
                        <a href="adminis.php">Cliente</a>
>>>>>>> 43b2ffc76e5b13b9e7f7dab2ac286fda289d9f7d
                        <a href="{{ route('fertilizantes') }}">Fertilizante</a>
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
<form action="{{ route('fertilizantes') }}" method="GET" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-floating mb-3">
                <input type="input" class="form-control" name="buscar" value="{{ old('buscar') }}" id="floatingBuscar" 
                    placeholder="ejemplo: Fertilizante organico" aria-describedby="buscarHelp">
                <div id="buscarHelp" class="form-text">@if($errors->first('buscar')) <i>El campo Buscar no es correcto!!!</i> @endif</div>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
            <a href="{{ route('fertilizantes') }}">
                <button type="button" class="btn btn-danger">Reiniciar</button>
            </a>
        </form>
    <br>
    <h3>Administración de registro de fertilizantes</h3>
    <h5>Tabla de registro</h5>
    <hr>

    <p style="text-align: right;">
        <a href="{{ route('herramienta_grafica') }}" class="boton">Ver Gráfica</a>
        <a href="{{ route('fertilizante.pdf', ['buscar' => request('buscar')]) }}" class="boton">PDF</a>
        <a href="{{ route('fertilizante_alta') }}" class="boton">Nuevo registro</a>
    </p>
    
<hr><br>
<table class="table">
    <tr>
        <th>Foto</th>
        <th>N°</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Editar</th>
        <th>Eliminar</th>
    
</tr>
@foreach($fertilizante as $key=>$fertilizantes)
<tr>
    <td><img src="{{ 'img/' . $fertilizantes->imagen }}" style="width: 30px; height: 30px;"></td>
    <td>{{ $fertilizantes->id_fertilizante }}</td>
    <td>{{ $fertilizantes->nombre }}</td>
    <td>{{ $fertilizantes->descripcion }}</td>
    <td><a href="{{ route('fertilizante_editar', $fertilizantes->id_fertilizante) }}">
            <button type="button" class="boton2">Editar</button>
</a></td>
<td><a href="{{ route('fertilizante_borrar', $fertilizantes->id_fertilizante) }}">
            <button type="button" class="boton2">Eliminar</button>
</a></td>
<td><a href="{{ route('fertilizante_detalle', $fertilizantes->id_fertilizante) }}">
            <button type="button" class="boton2">Consultar</button>
</a></td>
</tr>
@endforeach
</table>

<div class="pagination pagination-sm">
            {{ $fertilizante->links('pagination::bootstrap-5') }}
</div>

</div>
</body>
</html>
