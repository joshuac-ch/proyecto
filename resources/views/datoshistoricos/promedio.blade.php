@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h1>Ventas Ganadas por Mes</h1>

    <canvas id="ventasGanadasChart" width="400" height="200"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Promedio de Monto de Oportunidad -->
    <h3>Promedio de Monto de Oportunidad: {{ $promedioMonto }}</h3>
</div>

@endsection