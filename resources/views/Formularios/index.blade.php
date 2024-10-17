@extends('layout.app')
@section('contenido')
<style>
    .formulario-principal {
        margin-left: 20px;
        margin-top: 100px;
        max-width: 550px;
    }

    .formulario-principal form {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .bx {
        cursor: pointer;
    }
</style>
<div class="conteiner">
    <h1>Formularios</h1>
    <h3>Crear Formulario por Defecto <i class='bx bx-edit-alt'></i> </h3>
    <button type="button" class="creacion" onclick="realizarFormulario()">Crear Formulario por defecto</button>

    <div class="formulario-principal">


    </div>
</div>
<script>
    function realizarFormulario() {
        let contador = 0;
        let formulario_principal = document.querySelector(".formulario-principal");
        let form_ele = document.createElement("form");
        let lista_valores = ["*Nombre", "*Apellido", "*Correo", "*Telefono", "*Dirrecion", "*Ciudad", "*Region", "*Pais", "*Nombre empresa"]
        while (contador <= 8) {
            let div_ele = document.createElement("div");
            div_ele.classList.add("mb-3")
            let label_ele = document.createElement("label");
            label_ele.classList.add("form-label")
            label_ele.textContent = lista_valores[contador];

            let input_ele = document.createElement("input");
            input_ele.classList.add("form-control")
            div_ele.appendChild(label_ele);
            div_ele.appendChild(input_ele);
            form_ele.appendChild(div_ele)
            formulario_principal.appendChild(form_ele);
            contador++
        }
        let boton_ele = document.createElement("button");
        boton_ele.textContent = "Enviar Formularios"
        boton_ele.classList.add("btn", "btn-primary")
        form_ele.appendChild(boton_ele)

    }
</script>
@endsection