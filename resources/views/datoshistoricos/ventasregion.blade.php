@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h3>Estado de Oportunidad por Sector del Cliente</h3>
    <canvas id="ventasPorSectorEstadoChart" width="400" height="200"></canvas>

    <script>
        // Procesar datos para el gráfico
        var sectores = @json($ventasPorSectorEstado->pluck('sector_cliente')->unique());
        var estados = @json($ventasPorSectorEstado->pluck('estado_oportunidad')->unique());
        var datos = {};

        @foreach($ventasPorSectorEstado as $venta)
        if (!datos["{{ $venta->estado_oportunidad }}"]) {
            datos["{{ $venta->estado_oportunidad }}"] = [];
        }
        datos["{{ $venta->estado_oportunidad }}"].push({
            x: "{{ $venta->sector_cliente }}",
            y: {
                {
                    $venta->cantidad
                }
            }
        });
        @endforeach

        var ctx = document.getElementById('ventasPorSectorEstadoChart').getContext('2d');
        var ventasPorSectorEstadoChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: sectores,
                datasets: estados.map(estado => ({
                    label: estado,
                    data: datos[estado],
                    backgroundColor: estado === "Ganado" ? 'rgba(75, 192, 192, 0.2)' : 'rgba(255, 99, 132, 0.2)',
                    borderColor: estado === "Ganado" ? 'rgba(75, 192, 192, 1)' : 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }))
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