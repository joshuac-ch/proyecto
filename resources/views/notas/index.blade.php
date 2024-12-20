@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#PARA</th>
                <th scope="col">#NOTAS</th>
                <th scope="col">#CREADOR</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($tabla_n as $n)
            <tr>
                <td scope="row">{{ $n->parato ? $n->parato->nombre : 'sin contacto'}}</td>
                <td>{{$n->notas}}</td>
                <td>{{$n->usuarios ? $n->usuarios->nombre: 'no encontrado'}}</td>
            </tr>
            @endforeach


        </tbody>
    </table>
</div>
@endsection