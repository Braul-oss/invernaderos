<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráficas de Fertilizantes</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h3>Gráficas de Fertilizantes</h3>

    <!-- Gráfica de nombres -->
    <h4>Clasificación por Nombre</h4>
    <canvas id="graficaNombres" width="400" height="200"></canvas>

    <!-- Gráfica de precios -->
    <h4>Precios de Herramientas</h4>
    <canvas id="graficaPrecios" width="400" height="200"></canvas>

    <!-- Botones -->
    <br>
    <button id="descargarGraficaNombres" class="boton">Descargar Gráfica de Nombres</button>
    <button id="descargarGraficaPrecios" class="boton">Descargar Gráfica de Precios</button>
    <br><br>
    <a href="{{ route('fertilizantes') }}" class="boton">Volver</a>

    <script>
        // Datos dinámicos desde PHP
        const labelsNombres = {!! json_encode($nombres->pluck('nombre')) !!};
        const dataNombres = {!! json_encode($nombres->pluck('total')) !!};

        const labelsPrecios = {!! json_encode($precios->pluck('nombre')) !!};
        const dataPrecios = {!! json_encode($precios->pluck('precio')) !!};

        // Gráfica de Nombres
        const ctxNombres = document.getElementById('graficaNombres').getContext('2d');
        const graficaNombres = new Chart(ctxNombres, {
            type: 'bar',
            data: {
                labels: labelsNombres,
                datasets: [{
                    label: 'Cantidad de herramientas por nombre',
                    data: dataNombres,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Gráfica de Precios
        const ctxPrecios = document.getElementById('graficaPrecios').getContext('2d');
        const graficaPrecios = new Chart(ctxPrecios, {
            type: 'line',
            data: {
                labels: labelsPrecios,
                datasets: [{
                    label: 'Precios de fertilizantes',
                    data: dataPrecios,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true
            }
        });

        // Botones para descargar las gráficas
        document.getElementById('descargarGraficaNombres').addEventListener('click', function () {
            const link = document.createElement('a');
            link.href = graficaNombres.toBase64Image();
            link.download = 'grafica_nombres.png';
            link.click();
        });

        document.getElementById('descargarGraficaPrecios').addEventListener('click', function () {
            const link = document.createElement('a');
            link.href = graficaPrecios.toBase64Image();
            link.download = 'grafica_precios.png';
            link.click();
        });
    </script>
</body>
</html>