@extends('layout.app')
@section('contenido')
<style>
    .imagen-contact {
        img {
            border-radius: 50px;
            width: 80px;
        }

        .perfil-icon {
            border-radius: 50px;
            padding: 5px 10px;
            border: 2px solid gray;
        }
    }

    .perfil {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        gap: 1rem;
    }
</style>
<div class="conteiner">
    <div class="perfil">
        <div class="imagen-contact">
            <!--<img src="{{asset('assets/img/nino.jpg')}}" alt="">-->
            @if ($usuario->imagen==null)
            <div class="perfil-icon">
                {{ucfirst(substr($usuario->nombre,0,1))}}{{ucfirst(substr($usuario->apellido,0,1))}}
            </div>
            @else

            <img src="{{asset($usuario->imagen)}}" style="width:40px;height:40px;border-radius:50px" alt="">
            @endif


        </div>
        <div class="datos-contact">
            <h4>{{$usuario->nombre}} {{$usuario->apellido}}</h4>
            <h6 id="contenido-correo">{{$usuario->correo}} <span><i onclick="CopyPapel()" class="fa-solid fa-copy"></i></span></h6>
        </div>
    </div>
    <h1>Usuario: {{$usuario->id}}</h1>
    NOMBRE <h3>{{$usuario->nombre}}</h3><br>
    CORREO <h3>{{$usuario->correo}}</h3><br>
    CONTRASEÑA <h3>{{$usuario->contrasenna}}</h3><br>
    <a href="{{route('usuarios.edit',$usuario)}}">editar</a>
</div>
<script>
    function CopyPapel() {
        let contenido = document.getElementById('contenido-correo').innerText;
        navigator.clipboard.writeText(contenido)
            .then(() => {
                alert("Texto copiado al portapapeles!");
            })
            .catch(err => {
                console.error('Error al copiar al portapapeles: ', err);
            });
    }
</script>
@endsection