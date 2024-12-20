@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h1>Editar Contacto</h1>
    <form action="{{route('contactos.update',$contacto)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class=" mb-3">
            <label for="" class="form-label">Perfil</label>
            <input type="file" class="form-control" name="image1" id="enviar">
        </div>
        <div class="mb-3" id="mostrar">
            <img src="{{asset($contacto->imagen)}}" id="cambiar_imagen" class="form-control" style="width: 200px;height:200px;" alt="">

        </div>
        <div class="mb-3">
            <input type="text" class="form-control" value="{{old('image1',$contacto->imagen)}}" id="nombre_img">
        </div>

        <div class=" mb-3">
            <label for="" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nom" value="{{old('nom',$contacto->nombre)}}" id="">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Apellido</label>
            <input type="text" class="form-control" name="app" value="{{old('app',$contacto->apellido)}}" id="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Correo</label>
            <input type="text" class="form-control" name="cor" value="{{old('cor',$contacto->correo)}}" id="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Propietario ID</label>
            <select name="propi" id="">
                <option value="{{old('propi',$contacto->propietario_id)}}">{{old('propi',$contacto->propietario_id)}}</option>

            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Telefono</label>
            <input type="text" class="form-control" name="tel" value="{{old('tel',$contacto->telefono)}}" id="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Estado Lead</label>
            <select name="est" id="">
                <option value="{{old('est',$contacto->estado_lead)}}" selected>{{old('est',$contacto->estado_lead)}}</option>
                <option value="nuevo">nuevo</option>
                <option value="calificado">calificado</option>
                <option value="en contacto">en contacto</option>
                <option value="interesado">interesado</option>
                <option value="no interesado">no interesado</option>
                <option value="en espera">en espera</option>
                <option value="cliente">cliente</option>
                <option value="archivado">archivado</option>
                <option value=""></option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script>
    let nombre_img = document.getElementById("nombre_img");
    let cambiar_img = document.getElementById("cambiar_imagen");
    let mostrar = document.getElementById("enviar")
    //let div_mostrar = document.getElementById("mostrar")
    mostrar.addEventListener("change", function() {
        let imagen = this.files[0]

        if (imagen) {
            nombre_img.value = `perfiles/${this.files[0]["name"]}`
            let leer = new FileReader();
            leer.onload = function(e) {
                cambiar_img.src = e.target.result
            }

            leer.readAsDataURL(imagen)
        }


    })
</script>
@endsection