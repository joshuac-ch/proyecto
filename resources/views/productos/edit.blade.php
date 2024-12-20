@extends('layout.app')
@section('contenido')
<div class="container mt-5 p-4 shadow-sm rounded bg-light">
    <h1 class="text-center text-primary mb-4">Editar Producto: <span class="text-dark">{{$producto->nombre}}</span></h1>

    <form action="{{route('productos.update', $producto)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("put")

        <!-- Campo: Nombre del producto -->
        <div class="mb-3">
            <label for="producto1" class="form-label"><strong>Nombre del Producto</strong></label>
            <input type="text" class="form-control" name="producto1" id="producto1"
                value="{{old('producto1', $producto->nombre)}}" placeholder="Escribe el nombre del producto">
        </div>

        <!-- Campo: Imagen -->
        <div class="mb-3">
            <label for="imagen1" class="form-label"><strong>Imagen del Producto</strong></label>
            <input type="file" class="form-control enviar" id="imagen1" name="imagen1">

            <!-- Vista previa de la imagen actual -->
            <div class="mt-3 text-center">
                <p class="text-muted">Imagen Actual</p>
                <div class="position-relative d-inline-block">
                    <img src="{{asset($producto->imagen)}}" id="imagenactual" class="img-thumbnail actual"
                        style="width: 200px; height: 200px; object-fit: cover;" alt="Imagen actual">

                    <div class="position-absolute top-0 end-0 mt-2 me-2">
                        <button type="button" class="btn btn-light btn-sm me-2" title="Editar Imagen">
                            <i class="fa-solid fa-pen-to-square text-primary"></i>
                        </button>
                        <button type="button" class="btn btn-light btn-sm" title="Eliminar Imagen">
                            <i class="fa-solid fa-trash text-danger"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Campo: Precio -->
        <div class="mb-3">
            <label for="precio1" class="form-label"><strong>Precio</strong></label>
            <input type="text" class="form-control" name="precio1" id="precio1"
                value="{{old('precio1', $producto->precio)}}" placeholder="Escribe el precio">
        </div>

        <!-- Campo: Descripción -->
        <div class="mb-3">
            <label for="des1" class="form-label"><strong>Descripción</strong></label>
            <textarea class="form-control" name="des1" id="des1" rows="3"
                placeholder="Escribe una breve descripción">{{old('des1', $producto->descripcion)}}</textarea>
        </div>

        <!-- Campo: Stock -->
        <div class="mb-3">
            <label for="stock1" class="form-label"><strong>Stock</strong></label>
            <input type="number" class="form-control" name="stock1" id="stock1"
                value="{{old('stock1', $producto->stock)}}" placeholder="Cantidad disponible">
        </div>

        <!-- Campo: Vendedor -->
        <div class="mb-3">
            <label for="vendedor1" class="form-label"><strong>Vendedor</strong></label>
            <select class="form-select" name="vendedor1" id="vendedor1">
                <option selected value="{{old('vendedor1', $producto->vendedor_id)}}">
                    {{old('vendedor1', $producto->vendedor_id)}}
                </option>
                <!-- Opciones adicionales se pueden agregar dinámicamente -->
            </select>
        </div>

        <!-- Botón de envío -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg">Guardar Cambios</button>
        </div>
    </form>
</div>

<script>
    let imagen_actual = document.getElementById("imagenactual")
    let enviar_imagen = document.querySelector('.enviar')
    let actual = document.getElementById("actual");
    enviar_imagen.addEventListener('change', function() {
        let archivo = this.files[0]
        if (archivo) {
            let lectura = new FileReader();
            lectura.onload = function(e) {
                imagen_actual.src = e.target.result
            }
            lectura.readAsDataURL(archivo);
            actual.innerHTML = ""
            actual.appendChild(imagen_actual)

        }
    })
</script>
@endsection