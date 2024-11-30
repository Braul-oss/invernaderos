<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráficas de Invernaderos</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h3>Gráficas de Invernaderos</h3>

    <!-- Gráfica por tipo -->
    <h4>Clasificación por Tipo</h4>
    <canvas id="graficaTipos" width="400" height="200"></canvas>

    <!-- Gráfica por precio -->
    <h4>Precios de Invernaderos</h4>
    <canvas id="graficaPrecios" width="400" height="200"></canvas>

    <!-- Botones -->
    <br>
    <button id="descargarGraficaTipos" class="boton">Descargar Gráfica de Tipos</button>
    <button id="descargarGraficaPrecios" class="boton">Descargar Gráfica de Precios</button>
    <br><br>
    <a href="{{ route('invernadero') }}" class="boton">Volver</a>

    <script>
        // Datos dinámicos desde PHP
        const labelsTipos = {!! json_encode($tipos->pluck('tipo')) !!};
        const dataTipos = {!! json_encode($tipos->pluck('total')) !!};

        const labelsPrecios = {!! json_encode($precios->pluck('tipo')) !!};
        const dataPrecios = {!! json_encode($precios->pluck('precio')) !!};

        // Gráfica de Tipos
        const ctxTipos = document.getElementById('graficaTipos').getContext('2d');
        const graficaTipos = new Chart(ctxTipos, {
            type: 'pie',
            data: {
                labels: labelsTipos,
                datasets: [{
                    label: 'Número de invernaderos por tipo',
                    data: dataTipos,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });

        // Gráfica de Precios
        const ctxPrecios = document.getElementById('graficaPrecios').getContext('2d');
        const graficaPrecios = new Chart(ctxPrecios, {
            type: 'bar',
            data: {
                labels: labelsPrecios,
                datasets: [{
                    label: 'Precios de Invernaderos',
                    data: dataPrecios,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
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

        // Botones para descargar las gráficas
        document.getElementById('descargarGraficaTipos').addEventListener('click', function () {
            const link = document.createElement('a');
            link.href = graficaTipos.toBase64Image();
            link.download = 'grafica_tipos.png';
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

