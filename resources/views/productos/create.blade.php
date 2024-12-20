@extends('layout.app')
@section('contenido')
<style>
    #eli_img {
        display: none;
    }

    #eli_img i {
        cursor: pointer;
        margin: 0px 20px;
    }

    .imagen-pincipal {
        display: flex;
        align-items: end;
    }
</style>
<div class="conteiner">
    <h1>Nuevo Producto</h1>
    <div class="btn_regresar">
        <a href="{{route('productos.index')}}">Regresar</a>
    </div>
    <form action="{{route('productos.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Producto</label>
            <input type="text" class="form-control" name="producto1" id="">
            <label for="">Foto</label><br>
            <input type="file" name="imagen1" id="imagen1">
            <div class="imagen-pincipal">
                <div id="cargar">

                </div>
                <div id="eli_img">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <i class="fa-solid fa-trash"></i>
                </div>
            </div>
            <label for="" class="form-label">Precio</label>
            <input type="text" class="form-control" name="precio1" id="">
            <label for="" class="form-label">Descripcion</label>
            <input type="text" class="form-control" name="des1" id="">
            <label for="" class="form-label">Stock</label>
            <input type="text" class="form-control" name="stock1" id="">
            <select name="vendedor1">
                <option selected disabled>elige un vendedor</option>
                @foreach ($vendedor as $v )
                <option value="{{$v->id}}">{{$v->id}} {{$v->nombre}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Crear Producto</button>
    </form>
</div>
<script>
    let btn_eliminar = document.getElementById('eli_img');
    let eli = document.querySelector('.fa-trash')
    let cargar_imagen = document.getElementById("cargar");
    let laimagen = document.getElementById("imagen1");
    laimagen.addEventListener('change', function() {
        let archivo = this.files[0]
        if (archivo) {
            let leer = new FileReader();
            let imagen = document.createElement('img');
            imagen.style.maxWidth = "250px";
            leer.onload = function(e) {
                imagen.src = e.target.result
            }
            leer.readAsDataURL(archivo)
            cargar_imagen.innerHTML = ""
            cargar_imagen.appendChild(imagen)
            btn_eliminar.style.display = "flex"
            eli.addEventListener('click', function() {
                laimagen.value = ""
                cargar_imagen.innerHTML = ""
                btn_eliminar.style.display = "none" //Esto permite que el flujo se mantenga los botones
            })
        }

    });
</script>
@endsection