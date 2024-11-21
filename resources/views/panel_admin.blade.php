<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="{{ asset('css/panel.css') }}">
</head>
<body>
<div id="encabezado">
    <img src="{{ 'img/dino.jpg' }}" alt="logo empresa" id="imgenbn">
    <nav class="menu">
      <ul>
        <li>
          <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="cierre">Cerrar sesión</button>
          </form>
        </li>  
        <li><a href="#">Bienvenido:</a></li>
      </ul>
    </nav>
  </div>

<br>
<br><br><br><br>
<hr>

<div class="slideshow-container">

    <div class="carousel" id="carousel">
        <div class="carousel-item">
            <img src="{{ asset('img/invernaderos.png') }}" alt="Invernaderos">
            <div class="content">
                <a href="{{ route('invernadero') }}" class="btn btn-default btn-lg">Invernaderos</a>
            </div>
        </div>
        
        <div class="carousel-item">
            <img src="{{ asset('img/fertilizantes.png') }}" alt="Fertilizantes">
            <div class="content">
                <a href="{{ route('invernadero') }}" class="btn btn-default btn-lg">Fertilizantes</a>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('img/herramientas.png') }}" alt="Herramientas">
            <div class="content">
                <a href="{{ route('herramientas') }}" class="btn btn-default btn-lg">Herramientas</a>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('img/plantas.png') }}" alt="Plantas">
            <div class="content">
                <a href="{{ route('planta') }}" class="btn btn-default btn-lg">Plantas</a>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('img/clientes.png') }}" alt="Clientes">
            <div class="content">
                <a href="{{ route('planta') }}" class="btn btn-default btn-lg">Clientes</a>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('img/personales.png') }}" alt="Personal">
            <div class="content">
                <a href="{{ route('personal') }}" class="btn btn-default btn-lg">Personal</a>
            </div>
        </div>
    </div>

</div>

</body>
</html>