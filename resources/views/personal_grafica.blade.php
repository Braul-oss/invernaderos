<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráficas de Personal</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h3>Gráficas de Personal</h3>
    
    <!-- Gráfica por cargo -->
    <h4>Clasificación por Cargo</h4>
    <canvas id="graficaCargos" width="400" height="200"></canvas>

    <!-- Gráfica por nombre -->
    <h4>Clasificación por Nombre</h4>
    <canvas id="graficaNombres" width="400" height="200"></canvas>

    <!-- Botones -->
    <br>
    <button id="descargarGraficaCargos" class="boton">Descargar Gráfica de Cargos</button>
    <button id="descargarGraficaNombres" class="boton">Descargar Gráfica de Nombres</button>
    <br><br>
    <a href="{{ route('personal') }}" class="boton">Volver</a>

    <script>
        // Datos dinámicos desde PHP
        const labelsCargos = {!! json_encode($cargos->pluck('cargo')) !!};
        const dataCargos = {!! json_encode($cargos->pluck('total')) !!};

        const labelsNombres = {!! json_encode($nombres->pluck('nombre')) !!};
        const dataNombres = {!! json_encode($nombres->pluck('total')) !!};

        // Gráfica de Cargos
        const ctxCargos = document.getElementById('graficaCargos').getContext('2d');
        const graficaCargos = new Chart(ctxCargos, {
            type: 'bar',
            data: {
                labels: labelsCargos,
                datasets: [{
                    label: 'Número de empleados por cargo',
                    data: dataCargos,
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

        // Gráfica de Nombres
        const ctxNombres = document.getElementById('graficaNombres').getContext('2d');
        const graficaNombres = new Chart(ctxNombres, {
            type: 'pie', 
            data: {
                labels: labelsNombres,
                datasets: [{
                    label: 'Número de empleados por nombre',
                    data: dataNombres,
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

        // Botones para descargar las gráficas
        document.getElementById('descargarGraficaCargos').addEventListener('click', function () {
            const link = document.createElement('a');
            link.href = graficaCargos.toBase64Image();
            link.download = 'grafica_cargos.png';
            link.click();
        });

        document.getElementById('descargarGraficaNombres').addEventListener('click', function () {
            const link = document.createElement('a');
            link.href = graficaNombres.toBase64Image();
            link.download = 'grafica_nombres.png';
            link.click();
        });
    </script>
</body>
</html>