@extends('layout.app')
@section('contenido')
<style>
    .perfil {
        display: flex;
        justify-content: space-between;
        align-items: center;
        align-content: center;
        margin-right: 20px;
        width: 200px;

    }

    .pass {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 0px;
        padding: 0px;
        margin-right: 20px;

        input {
            margin: 0px 20px;
        }


    }

    .editar {


        i {
            cursor: pointer;
        }
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
</style>
<div class="conteiner">
    <h1>Usuarios</h1>
    <div>
        <a href="{{route('usuarios.create')}}" class="creacion">Crear Usuario</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">CORREO</th>
                <th scope="col">CONTRASEÑA</th>
                <th scope="col">EDITAR</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($conexion as $c)

            <tr>
                <th scope="row">
                    <li>{{$c->id}}</li>
                </th>
                <td class="perfil">

                    @if ($c->imagen!=null)
                    <img src="{{$c->imagen}}" style="width:40px;height:40px;border-radius:50px" alt="">
                    @else
                    <div class="perfil-name">
                        {{ucfirst(substr($c->nombre,0,1))}}{{ucfirst(substr($c->apellido,0,1))}}
                    </div>
                    @endif
                    <span> {{$c->nombre}} <a href="{{route('usuarios.show',$c)}}"><i class='bx bx-show-alt'></i></a></span>
                </td class="data">

                <td>
                    {{$c->correo}}
                </td>
                <td class="pass">

                    <input type="password" value="{{$c->contrasenna}}" id="passwordField{{$c->id}}" class="form-control" readonly>
                    <!-- Botón para alternar la visibilidad -->
                </td>
                <td class="editar">
                    <i class='bx bx-low-vision' onclick="togglePasswordVisibility('{{$c->id}}')"></i>
                    <a href="{{route('usuarios.show',$c->id)}}"><i class='bx bx-edit-alt'></i></a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
<script>
    function togglePasswordVisibility(id) {
        // Obtener el campo de la contraseña por ID
        const passwordField = document.getElementById(`passwordField${id}`);

        // Alternar entre tipo 'text' y 'password'
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
        } else {
            passwordField.type = 'password';
        }
    }
</script>
@endsection
