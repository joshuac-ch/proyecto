<h1>Estado de Oportunidad por cliente</h1>

<canvas id="oportunidadesPorCanalEstadoChart" width="500" height="300"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    //var canales = @json($ventasPorCanalEstado->pluck('canal_contacto')->unique());
    //var estadosCanal = @json($ventasPorCanalEstado->pluck('estado_oportunidad')->unique());
    var datosCanal = {};
    var ventasHistoricas = @json($oportunidadesh);
    // Procesar datos para el gráfico
    var des = [...new Set(ventasHistoricas.map(v => v.id))]; // Todos los sectores únicos
    var estadosCanal = [...new Set(ventasHistoricas.map(v => v.estado))]; // Todos los estados únicos



    console.log('datosCanalddd:', datosCanal);
    var ctx2 = document.getElementById('oportunidadesPorCanalEstadoChart').getContext('2d');
    var ventasPorCanalEstadoChart = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: des,
            datasets: estadosCanal.map(estado => ({
                label: estado,
                data: des,
                backgroundColor: estado === "nuevo" ? '#dfe3fa' : 'rgba(255, 99, 132, 0.2)',
                borderColor: estado === "nuevo" ? '#5e72e4' : 'rgba(255, 99, 132, 1)',
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