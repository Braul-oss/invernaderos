<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('css/about.css') }}" rel="stylesheet">

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
            <li><a href="{{ route('login') }}">Iniciar sesión</a></li>
            <li><a href="{{ route('productos') }}">Productos</a></li>
            <li><a href="{{ route('servicios') }}">Servicios</a></li>
            <li><a href="{{ route('nosotros') }}">Nosotros</a></li>
        </ul>
    </nav>

<div class="about-page">
    <section class="hero-section">
        <div class="hero-content">
            <h1>Sobre Nosotros</h1>
            <p>Descubre quiénes somos, nuestra misión y valores.</p>
        </div>
    </section>

    <section class="values-section">
        <h2>Misión, Visión y Valores</h2>
        <div class="values-grid">
            <div class="value-item">
                <h3>Nuestra Misión</h3>
                <p>Ser una empresa de desarrollo de software reconocida.</p>
            </div>
            <div class="value-item">
                <h3>Nuestra Visión</h3>
                <p>Ser líderes en la industria con responsabilidad y compromiso social.</p>
            </div>
            <div class="value-item">
                <h3>Nuestros Valores</h3>
                <p>Integridad, calidad y respeto por las comunidades y el medio ambiente.</p>
            </div>
        </div>
    </section>

    <section class="history-section">
        <h2>Nuestra Historia</h2>
        <p>
            Desde nuestros humildes comienzos somos una empresa que nace a partir
            de un proyecto escolar.
        </p>
        <p>
            Hoy seguimos desarrollando otros proyectos escolares y buscamos algún dia 
            ser reconocidos como una empresa importante.
        </p>
    </section>

    <section class="team-section">
    <h2>Nuestro Equipo Directivo</h2>
    <p>Conoce a las personas que lideran nuestra organización con visión y compromiso.</p>
    <div class="team-grid">
        <div class="team-member">
            <img src="{{ asset('imagenes/Azalia.jpg') }}" alt="Director General">
            <h3>Azalia Mejía</h3>
            <p>Directora General</p>
        </div>
        <div class="team-member">
            <img src="{{ asset('imagenes/Gustavo.jpg') }}" alt="Desarrollador web">
            <h3>Gustavo Vazquez</h3>
            <p>Desarrollador web</p>
        </div>
        <div class="team-member">
            <img src="{{ asset('imagenes/img.png') }}" alt="Gestor de bases de datos">
            <h3>Braulio Hernández</h3>
            <p>Gestor de bases de datos</p>
        </div>
    </div>
</section>

</div>
</body>
</html>
