@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h1>Editar usuario</h1>
    <form action="{{route('perfil.update',$usuario)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("put")
        <div class="mb-3">
            <label for="example" class="form-label">PERFIL</label>
            <input type="file" class="form-control" name="imagen" value="{{old('imagen',$usuario->imagen)}}" id="cambiar">

        </div>
        <div class="mb-3" id="mostrar">
            <img src="{{asset($usuario->imagen)}}" id="cambiar_imagen" class="form-control" style="width: 200px;height:200px;" alt="">

        </div>
        <div class="mb-3">
            <label for="example" class="form-label">NOMBRE</label>
            <input type="text" class="form-control" id="example" name="nombre" value="{{old('nombre',$usuario->nombre)}}">
        </div>
        <div class="mb-3">
            <label for="example" class="form-label">EMAIL</label>
            <input type="text" class="form-control" id="example" name="email" value="{{old('email',$usuario->correo)}}">
        </div>
        <div class="mb-3">
            <label for="example" class="form-label">CONTRASEÑA</label>
            <input type="text" class="form-control" id="example" name="pass" value="{{old('pass',$usuario->contrasenna)}}">
        </div>
        <button type="submit" class="btn btn-primary">editar Usuario</button>
    </form>
</div>
<script>
    let mostar = document.getElementById('cambiar_imagen');
    let imagen = document.getElementById('cambiar');
    imagen.addEventListener('change', function() {
        let archivo = this.files[0]
        if (archivo) {
            let leer = new FileReader();
            leer.onload = function(e) {
                mostar.src = e.target.result
            }
            leer.readAsDataURL(archivo)

        }

    })
</script>
@endsection