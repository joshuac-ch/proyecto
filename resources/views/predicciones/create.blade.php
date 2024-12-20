@extends('layout.app')
@section('contenido')
<div class="conteiner">
    @if(session('status'))
    <div class="alert alert-info">
        Estado de predicción: {{ session('status') }}
    </div>
    @endif

    <h1>Realizar Prediccion</h1>
    <h4>Activa el servicio php artisan queue:work</h4>
    <form method="post" action="{{route('prediccion.store')}}" id="prediccionForm">
        @csrf

        <div class="mb-3">
            <label for="monto_oportunidad" class="form-label">Monto Oportunidad</label>
            <input type="number" class="form-control" name="monto_oportunidad" id="monto_oportunidad">
        </div>
        <div class="mb-3">
            <label for="tiempo_oportunidad_dias" class="form-label">Tiempo Oportunidad días</label>
            <input type="text" class="form-control" name="tiempo_oportunidad_dias" id="tiempo_oportunidad_dias">
        </div>
        <div class="mb-3">
            <label for="numero_interacciones" class="form-label">Número Interacciones</label>
            <input type="text" class="form-control" name="numero_interacciones" id="numero_interacciones">
        </div>
        <div class="mb-3">
            <label for="sector_cliente" class="form-label">Sector Cliente</label>
            <select name="sector_cliente" class="form-control" id="sector_cliente">
                @foreach ($opt as $o)
                <option value="{{$o}}">{{$o}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="productos_ofrecidos" class="form-label">Productos Ofrecidos</label>
            <input type="text" class="form-control" name="productos_ofrecidos" id="productos_ofrecidos">
        </div>
        <div class="mb-3">
            <label for="region_cliente" class="form-label">Región Cliente</label>
            <select name="region_cliente" class="form-control" id="region_cliente">
                @foreach ($region as $r)
                <option value="{{$r}}">{{$r}}</option>
                @endforeach
            </select>

        </div>
        <div class="mb-3">
            <label for="canal_contacto" class="form-label">Contacto Cliente</label>

            <select name="canal_contacto" class="form-control" id="canal_contacto">
                @foreach ($social as $s)
                <option value="{{$s}}">{{$s}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="interacciones_previas" class="form-label">Interacciones Previas</label>
            <input type="text" class="form-control" name="interacciones_previas" id="interacciones_previas">
        </div>
        <div class="mb-3">
            <label for="presupuesto_cliente" class="form-label">Presupuesto Cliente</label>
            <input type="text" class="form-control" name="presupuesto_cliente" id="presupuesto_cliente">
        </div>

        <div class="mb-3">
            <label for="estado_predicho" class="form-label">Estado Predicho</label>
            <input type="text" class="form-control" name="estado_predicho" id="estado_predicho" readonly>
        </div>


        <button type="submit" class="btn btn-primary">Guardar Predicción</button>
    </form>
</div>
@endsection