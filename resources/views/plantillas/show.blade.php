@extends('layout.app')
@section('contenido')
<style>
    .contenedorPlantilla {
        border: 2px solid black;
        background-color: white;
        max-width: 700px;
        border-radius: 10px;
        padding: 20px;
    }
</style>
<div class="conteiner">
    <h1>Tu Plantilla: {{$plantilla->nombre}}</h1>
    <div class="plantilla">
        {{$plantilla->asunto}} <br>
        <div class="contenedorPlantilla">
            {{!!$plantilla->Descripcion!!}}
        </div>
    </div>

    <h2></h2>
</div>
@endsection