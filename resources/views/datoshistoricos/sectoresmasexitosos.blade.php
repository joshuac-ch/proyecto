<h1>mejores sectores exitosos</h1>

<canvas id="ventas333PorCanalEstadoChart" width="500" height="300"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var datosCanal = {};
    var ventasHistoricas = @json($ventasHistoricas);
    // Procesar datos para el gráfico
    var regiones = [...new Set(ventasHistoricas.map(v => v.region_cliente))]; // Todos los sectores únicos
    var estadosCanal = [...new Set(ventasHistoricas.map(v => v.estado_oportunidad))]; // Todos los estados únicos


    @foreach($ventaRegional as $venta1)
    if (!datosCanal["{{ $venta1->estado_oportunidad }}"]) {
        datosCanal["{{ $venta1->estado_oportunidad }}"] = [];
    }
    datosCanal["{{ $venta1->estado_oportunidad }}"].push({
        x: "{{ $venta1->region_cliente }}",
        y: "{{ $venta1->Cantidad }}"
    });
    @endforeach

    // Verifica si los datos están siendo cargados correctamente
    console.log('datosCanal:', datosCanal); //Funciona bien
    var ctx22 = document.getElementById('ventas333PorCanalEstadoChart').getContext('2d');
    var ventas333PorCanalEstadoChart = new Chart(ctx22, {
        type: 'bar',
        data: {
            labels: regiones,
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