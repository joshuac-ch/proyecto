@extends('layout.app')
@section('contenido')
<style>

</style>
<div class="conteiner">
    <h1>Wasap</h1>
    <form action="{{ route('enviar-imagen.wasap') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="telefono">Número de teléfono:</label>
        <input type="text" id="telefono" name="telefono" required>

        <label for="imagen">Selecciona una imagen:</label>
        <!--<input type="file" id="imagen" name="imagen" accept="image/*" required>-->
        <input type="text" id="imagen" name="imagen">

        <button type="submit">Enviar Imagen</button>
    </form>
</div>
@endsection