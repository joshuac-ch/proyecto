<style>
    h1 {
        font-size: 18px;
    }
</style>
<h1>Estado de Oportunidad por Sector del Cliente</h1>

<canvas id="ventasPorSectorEstadoChart" width="900" height="300"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Datos en JSON desde el backend
    var ventasHistoricas = @json($ventasHistoricas);

    // Procesar datos para el gráfico
    var sectores = [...new Set(ventasHistoricas.map(v => v.sector_cliente))]; // Todos los sectores únicos
    var estados = [...new Set(ventasHistoricas.map(v => v.estado_oportunidad))]; // Todos los estados únicos

    // Crear la estructura de datos agrupada
    var datosAgrupados = {};
    estados.forEach(estado => {
        datosAgrupados[estado] = sectores.map(sector => {
            // Encontrar todas las ventas para este estado y sector y contar cuántas hay
            const ventasPorSectorEstado = ventasHistoricas.filter(v => v.sector_cliente === sector && v.estado_oportunidad === estado);
            return ventasPorSectorEstado.length;
        });
    });

    // Crear los datasets para Chart.js usando la estructura de datos agrupada
    var datasets = estados.map((estado, index) => ({
        label: estado,
        data: datosAgrupados[estado],
        backgroundColor: index === 0 ? '#dfe3fa' : 'rgba(255, 99, 132, 0.2)',
        borderColor: index === 0 ? '#5e72e4' : 'rgba(255, 99, 132, 1)',
        borderWidth: 1
    }));

    // Configuración de Chart.js
    var ctx = document.getElementById('ventasPorSectorEstadoChart').getContext('2d');
    var ventasPorSectorEstadoChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: sectores, // Ejes x
            datasets: datasets // Conjuntos de datos para cada estado
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Cantidad de Oportunidades'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Sector del Cliente'
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top'
                },
                title: {
                    display: true,
                    text: 'Estado de Oportunidad por Sector del Cliente'
                }
            }
        }
    });
</script>