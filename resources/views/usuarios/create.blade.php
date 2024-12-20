@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h1>Bienvenidos a Crear Usuario</h1>
    <div class="btn_regresar">
        <a href="{{route('usuarios.index')}}">Regresar</a>
    </div>
    <form action="{{route('usuarios.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Imagen Perfil</label>
            <input type="file" class="form-control" name="imagen" id="enviar">
        </div>
        <div class="mb-3" id="mostrar">

        </div>
        <div class="mb-3">
            <label for="example" class="form-label">NOMBRE</label>
            <input type="text" class="form-control" id="example" name="nombre">
        </div>
        <div class="mb-3">
            <label for="example" class="form-label">EMAIL</label>
            <input type="text" class="form-control" id="example" name="email">
        </div>
        <div class="mb-3">
            <label for="example" class="form-label">CONTRASEÑA</label>
            <input type="text" class="form-control" id="example" name="pass">
        </div>
        <button type="submit" class="btn btn-primary">Crear Usuario</button>
    </form>
</div>
<script>
    let mostrar_imagen = document.getElementById("mostrar");
    let image1 = document.getElementById("enviar");
    image1.addEventListener('change', function() {
        let valor_img = this.files[0]

        if (valor_img) {
            let lector = new FileReader();
            let elemento_img = document.createElement("img")
            elemento_img.style.width = "100px"
            lector.onload = function(e) {
                // console.log(e.target.result)
                elemento_img.src = e.target.result;
            }
            lector.readAsDataURL(valor_img)
            mostrar_imagen.innerHTML = ""
            mostrar_imagen.appendChild(elemento_img)
        }
    })
</script>
@endsection