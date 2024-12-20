@extends('layout.app')
@section('contenido')
<div class="conteiner mt-5 p-4 shadow-sm rounded bg-light">
    <h1 class="text-center text-primary mb-4">Editar Usuario</h1>
    <form action="{{route('usuarios.update', $usuario)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("put")

        <!-- Imagen de perfil -->
        <div class="mb-4 text-center">
            <img src="{{asset($usuario->imagen)}}"
                id="cambiar_imagen"
                class="rounded-circle border border-secondary"
                style="width: 150px; height: 150px; object-fit: cover;"
                alt="Imagen de perfil">
            <p class="mt-2 text-muted">Haz clic en el campo de abajo para cambiar la imagen</p>
        </div>

        <!-- Carga de imagen -->
        <div class="mb-3">
            <label for="cambiar" class="form-label fw-bold">Actualizar Perfil</label>
            <input type="file"
                class="form-control"
                name="imagen"
                value="{{old('imagen', $usuario->imagen)}}"
                id="cambiar">
        </div>

        <!-- Nombre -->
        <div class="mb-3">
            <label for="nombre" class="form-label fw-bold">Nombre</label>
            <input type="text"
                class="form-control"
                id="nombre"
                name="nombre"
                placeholder="Ingresa tu nombre"
                value="{{old('nombre', $usuario->nombre)}}">
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label fw-bold">Correo Electrónico</label>
            <input type="email"
                class="form-control"
                id="email"
                name="email"
                placeholder="Ingresa tu correo electrónico"
                value="{{old('email', $usuario->correo)}}">
        </div>

        <!-- Contraseña -->
        <div class="mb-3">
            <label for="pass" class="form-label fw-bold">Contraseña</label>
            <input type="password"
                class="form-control"
                id="pass"
                name="pass"
                placeholder="Ingresa tu nueva contraseña"
                value="{{old('pass', $usuario->contrasenna)}}">
        </div>

        <!-- Botón de envío -->
        <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-lg">Guardar Cambios</button>
        </div>
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