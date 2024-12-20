<h1>Estado de Oportunidad por Canal de Contacto</h1>

<canvas id="ventasPorCanalEstadoChart" width="500" height="300"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    //var canales = @json($ventasPorCanalEstado->pluck('canal_contacto')->unique());
    //var estadosCanal = @json($ventasPorCanalEstado->pluck('estado_oportunidad')->unique());
    var datosCanal = {};
    var ventasHistoricas = @json($ventasHistoricas);
    // Procesar datos para el gráfico
    var canales = [...new Set(ventasHistoricas.map(v => v.canal_contacto))]; // Todos los sectores únicos
    var estadosCanal = [...new Set(ventasHistoricas.map(v => v.estado_oportunidad))]; // Todos los estados únicos


    @foreach($ventasPorCanalEstado as $venta)
    if (!datosCanal["{{ $venta->estado_oportunidad }}"]) {
        datosCanal["{{ $venta->estado_oportunidad }}"] = [];
    }
    datosCanal["{{ $venta->estado_oportunidad }}"].push({
        x: "{{ $venta->canal_contacto }}",
        y: "{{ $venta->cantidad }}"
    });
    @endforeach
    console.log('datosCanalddd:', datosCanal);
    var ctx2 = document.getElementById('ventasPorCanalEstadoChart').getContext('2d');
    var ventasPorCanalEstadoChart = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: canales,
            datasets: estadosCanal.map(estado => ({
                label: estado,
                data: datosCanal[estado],
                backgroundColor: estado === "Ganado" ? '#dfe3fa' : 'rgba(255, 99, 132, 0.2)',
                borderColor: estado === "Ganado" ? '#5e72e4' : 'rgba(255, 99, 132, 1)',
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