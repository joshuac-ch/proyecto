@extends('layout.app')
@section('contenido')
<div class="conteiner">
    @if(session('status'))
    <div class="alert alert-info">
        Estado de predicción: {{ session('status') }}
    </div>
    @endif

    <h1>Realizar Prediccion</h1>
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
            <input type="text" class="form-control" name="sector_cliente" id="sector_cliente">
        </div>
        <div class="mb-3">
            <label for="productos_ofrecidos" class="form-label">Productos Ofrecidos</label>
            <input type="text" class="form-control" name="productos_ofrecidos" id="productos_ofrecidos">
        </div>
        <div class="mb-3">
            <label for="region_cliente" class="form-label">Región Cliente</label>
            <input type="text" class="form-control" name="region_cliente" id="region_cliente">
        </div>
        <div class="mb-3">
            <label for="canal_contacto" class="form-label">Contacto Cliente</label>
            <input type="text" class="form-control" name="canal_contacto" id="canal_contacto">
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

        <button type="button" id="predictButton">Generar Predicción</button>
        <button type="submit" class="btn btn-primary">Guardar Predicción</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
<script>
    const modelUrl = 'model.json';

    async function loadModel() {
        const model = await tf.loadLayersModel(modelUrl);
        console.log("Modelo cargado correctamente");
        return model;
    }

    async function makePrediction(inputData) {
        const model = await loadModel();
        const tensorData = tf.tensor2d([inputData]);
        const prediction = model.predict(tensorData);
        const predictionArray = await prediction.array();

        // Liberar memoria
        tensorData.dispose();
        prediction.dispose();

        return predictionArray;
    }

    document.getElementById("predictButton").addEventListener("click", async () => {
        const inputData = [
            parseFloat(document.getElementById("monto_oportunidad").value),
            parseFloat(document.getElementById("tiempo_oportunidad_dias").value),
            parseFloat(document.getElementById("numero_interacciones").value),
            parseFloat(document.getElementById("interacciones_previas").value),
            parseFloat(document.getElementById("presupuesto_cliente").value)
        ];

        try {
            const result = await makePrediction(inputData);
            document.getElementById("estado_predicho").value = result[0][0] > 0.5 ? 'Ganado' : 'Perdido';
        } catch (error) {
            console.error("Error al realizar la predicción:", error);
            alert("Hubo un error al realizar la predicción. Revisa la consola para más detalles.");
        }
    });
</script>
@endsection