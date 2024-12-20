<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Insights Generados por IA</h2>

        <div class="row">
            <!-- Total de Oportunidades -->
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total de Oportunidades</h5>
                        <p class="card-text">{{ $insights['total_oportunidades'] }}</p>
                    </div>
                </div>
            </div>

            <!-- Oportunidades Ganadas -->
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Oportunidades Ganadas</h5>
                        <p class="card-text">{{ $insights['oportunidades_ganadas'] }}</p>
                    </div>
                </div>
            </div>

            <!-- Porcentaje de Oportunidades Ganadas -->
            <div class="col-md-4">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Porcentaje Ganado</h5>
                        <p class="card-text">{{ $insights['porcentaje_ganadas'] }}%</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Oportunidades Perdidas -->
            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Oportunidades Perdidas</h5>
                        <p class="card-text">{{ $insights['oportunidades_perdidas'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>