@extends('layout.dashboard')
@section('das')
<style>
    .dashboards {
        display: flex;

        align-items: start;
        justify-content: space-between;
        margin: 15px 0px;

        gap: 1rem;
    }

    .caja,
    .caja-2 {
        border: 2px solid white;
        background-color: white;
        padding: 20px;
        margin: 0px 5px;
        border-radius: 10px;
        box-shadow: 0px 0px 12px 1px black;

    }
</style>
<div class="dashboards">
    <div class="caja">
        @include('datoshistoricos.actividadesOportunidades')

    </div>
    <div class="caja-2">
        @include('datoshistoricos.canaloportunidades')

    </div>
</div>
@endsection