@extends('layout.app')
@section('contenido')
<style>
    .perfil {
        display: flex;
        justify-content: space-between;
        align-items: center;
        align-content: center;
        margin-right: 20px;
    }

    .perfil-name {
        display: flex;
        justify-content: space-around;
        align-items: center;
        border-radius: 50px;
        width: 38px;
        height: 38px;
        border: 2px solid gray;
    }

    .datos-content {
        align-content: center;

    }
</style>
<div class="conteiner" style="pointer-events: none">
    <h1>Contactos</h1>
    <div>
        <a class="creacion" href="{{route('contactos.create')}}">Crear Contacto</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">#NOMBRE</th>
                <th scope="col">#APELLIDO</th>
                <th scope="col">#CORREO</th>
                <th scope="col">#PROPIETARIO ID</th>
                <th scope="col">#TELEFONO</th>
                <th scope="col">#ESTADO LEAD</th>
                <th scope="col">#EDITAR</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($contactos as $c)
            <tr>
                <th scope="row">{{$c->id}}</th>
                <td class="perfil">

                    @if ($c->imagen!=null)
                    <img src="{{$c->imagen}}" style="width:40px;height:40px;border-radius:50px" alt="">
                    @else
                    <div class="perfil-name">
                        {{ucfirst(substr($c->nombre,0,1))}}{{ucfirst(substr($c->apellido,0,1))}}
                    </div>
                    @endif

                    <span> {{$c->nombre}} <a href="{{route('contactos.show',$c->id)}}"><i class='bx bx-show-alt'></i></a></span>
                </td>

                <td class="datos-content">{{$c->apellido}}</td>
                <td class="datos-content">{{$c->correo}}</td>
                <td class="datos-content">{{$c->propietario_id}}</td>
                <td class="datos-content ">{{$c->telefono}}</td>
                <td class="datos-content ">{{$c->estado_lead}}</td>
                <td class="datos-content">
                    <a href=" {{route('contactos.edit',$c)}}"><i class='bx bx-edit-alt'></i></a>
                    <a href=""><i class='bx bxs-trash'></i></a>
                </td>

            </tr>

            @endforeach


        </tbody>
    </table>


</div>
@endsection
