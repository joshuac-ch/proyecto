@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h1>Ventas Ganadas por Mes</h1>

    <canvas id="ventasGanadasChart" width="400" height="200"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Obtener los datos pasados desde el controlador
        var meses = @json($meses); // Meses
        var totales = @json($totales); // Totales de ventas

        // Crear el gráfico
        var ctx = document.getElementById('ventasGanadasChart').getContext('2d');
        var ventasGanadasChart = new Chart(ctx, {
            type: 'bar', // Tipo de gráfico (barras)
            data: {
                labels: meses, // Etiquetas (Meses)
                datasets: [{
                    label: 'Ventas Ganadas',
                    data: totales, // Datos (Totales de ventas)
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
    </script>
</div>

@endsection