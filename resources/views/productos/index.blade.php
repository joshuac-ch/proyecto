@extends('layout.app')
@section('contenido')
<style>
    .lista-productos {
        display: flex;
        flex-wrap: wrap;
        gap: 2rem;
        margin: 20px;
    }

    .producto {
        border: 2px solid #5e72e4;
        padding: 10px;
        border-radius: 20px;
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        max-width: 250px;

        .header-productos {
            label {
                font-size: 15px;
            }

            display: flex;
            align-items: center;

            justify-content: space-between;

            .botones {
                display: flex;
                flex-direction: column;
            }
        }

        .body-productos {

            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;



            img {
                height: 300px;
                min-width: 150px;
                margin-bottom: 10px;
            }

            label {
                text-align: center;
                font-size: 15px;
            }
        }

        .food-productos {
            label {
                text-align: center;
                font-size: 15px;
            }

            .datos-productos {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
        }
    }

    .producto:hover {
        transition: all .5s ease;
        opacity: 0.9;
        background-color: white;
        box-shadow: 0px 0px 20px black;

        label {
            transition: all .5s ease;
            color: #5e72e4;
        }

    }
</style>

<div class="container mt-5 p-4 shadow-sm rounded bg-light">
    <h1 class="text-center text-primary mb-4">Gestión de Productos</h1>

    <!-- Botón de creación -->
    <div class="text-start mb-4">
        <a href="{{route('productos.create')}}" class="btn btn-success btn-lg">
            <i class="bx bx-plus"></i> Crear Producto
        </a>
    </div>

    <!-- Lista de productos -->
    <div class="row">
        @foreach ($productos as $p)
        <div class="col-md-4 mb-4">
            <div class="card shadow h-100">
                <!-- Encabezado del producto -->
                <div class="card-header bg-primary text-white text-center">
                    <h5 class="card-title m-0">{{$p->nombre}}</h5>

                </div>

                <!-- Imagen y detalles -->
                <div class="card-body text-center">
                    <img src="{{ asset($p->imagen) }}"
                        alt="Imagen no encontrada"
                        class="img-fluid rounded mb-3"
                        style="max-height: 150px; object-fit: cover;">
                    <p class="text-muted mb-1"><strong>Precio:</strong> ${{$p->precio}}</p>
                    <p class="small">{{$p->descripcion}}</p>
                </div>

                <!-- Información adicional -->
                <div class="card-footer ">
                    <div class="d-flex justify-content-between">
                        <span><strong>Stock:</strong> {{$p->stock}}</span>
                        <span><strong>Vendedor:</strong> {{$p->vendedor_id}}</span>
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="d-flex justify-content-around p-3">
                    <div class="btn botones">

                        <button type="button" class="btn btn-light btn-sm me-2" title="Editar Imagen">
                            <a href="{{route('productos.show',$p->id)}}"> <i class="fa-solid fa-pen-to-square text-primary"></i></a>
                        </button>
                        <button type="button" class="btn btn-light btn-sm" title="Eliminar Imagen">
                            <a href="{{route('productos.confirmDelete',$p->id)}}"> <i class="fa-solid fa-trash text-danger"></i></a>
                        </button>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection