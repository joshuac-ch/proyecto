@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Ventas por Estado de Oportunidad (PVS) -->
    <h3>Ventas por Estado</h3>
    <canvas id="ventasPorEstadoChart" width="400" height="200"></canvas>

    <script>
        var estados = @json($estados);
        var cantidadVentasPorEstado = @json($cantidadVentasPorEstado);

        var ctx2 = document.getElementById('ventasPorEstadoChart').getContext('2d');
        var ventasPorEstadoChart = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: estados,
                datasets: [{
                    label: 'Ventas por Estado',
                    data: cantidadVentasPorEstado,
                    backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'],
                    borderColor: ['rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'],
                    borderWidth: 1
                }]
            }
        });
    </script>
</div>
@endsection