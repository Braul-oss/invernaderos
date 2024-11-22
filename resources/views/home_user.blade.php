<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link href="{{ asset('css/pag.css') }}" rel="stylesheet">
    
</head>
<body>
    <nav class="navbar">
        <div class="logo-container">
            <a href="login.html"> 
                <img src="{{ asset('imagenes/dino.jpg') }}" alt="Logo" class="logo1">
            </a>
                <img src="{{ asset('imagenes/logolt.png') }}" alt="Logo2" class="logo2">
        </div>
        <ul>
            <li>
            <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="cierre">Cerrar sesión</button>
            </form>
            </li>
            <li><a href="{{ route('login') }}">Productos</a></li>
            <li><a href="{{ route('login') }}">Servicios</a></li>
            <li><a href="{{ route('login') }}">Nosotros</a></li>
        </ul>
    </nav>

    <div class="slideshow-container">
    <div class="mySlides fade">
        <div class="numbertext">1 / 4</div>
        <img src="{{ asset('imagenes/1.jpg') }}" height="600px" width="1500px">
        <h2 class="title">Optimización del espacio</h2>
        <p class="subtitle">Invernaderos diseñados para optimizar el aprovechamiento del espacio interior.</p>
	        <p class="link"><a href="{{ route('productos_invernadero') }}" class="btn btn-default btn-lg">Más información sobre invernaderos</a></p>
    </div>
    
    <div class="mySlides fade">
        <div class="numbertext">2 / 4</div>
        <img src="{{ asset('imagenes/2.jpg') }}" height="600px" width="1500px">
        <h2 class="title">Solución integral</h2>
        <p class="subtitle">Desde el asesoramiento inicial hasta la entrega del fertilizante ideal.</p>
        <p class="link"><a href="{{ route('productos_fertilizante') }}" class="btn btn-default btn-lg">Descubre nuestros fertilizantes</a></p>
    </div>
    
    <div class="mySlides fade">
        <div class="numbertext">3 / 4</div>
        <img src="{{ asset('imagenes/3.jpg') }}" height="600px" width="1500px">
        <h2 class="title">Garantía de máxima producción</h2>
        <p class="subtitle">Optimizamos los recursos del cliente para obtener la máxima producción.</p>
        <p class="link"><a href="{{ route('productos_herramienta') }}" class="btn btn-default btn-lg">Escoge entre nuestras herramientas</a></p>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">4 / 4</div>
        <img src="{{ asset('imagenes/4.jpg') }}" height="600px" width="1500px">
        <h2 class="title">Empieza tu proyecto</h2>
        <p class="subtitle">Te ofrecemos las herramientas para empezar tu invernadero.</p>
        <p class="link"><a href="{{ route('productos_planta') }}" class="btn btn-default btn-lg">Conoce nuestras plantas</a></p>
    </div>
    
    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>
</div>

<div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span> 
    <span class="dot" onclick="currentSlide(2)"></span> 
    <span class="dot" onclick="currentSlide(3)"></span>
    <span class="dot" onclick="currentSlide(4)"></span>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/carousel.js') }}"></script>

</body>
</html>
