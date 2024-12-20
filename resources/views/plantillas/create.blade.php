@extends('layout.app')
@section('contenido')
<style>
    .herramientas-email {
        display: flex;
        gap: 2rem;
        justify-content: start;
        align-items: center;
        padding-left: 30px;
        padding-top: 10px;

        i {
            cursor: pointer;
        }

        h5 {
            button {
                border: 0px solid transparent;
                color: #344767;
                background-color: transparent;
            }
        }
    }

    #contenido-email {
        width: 650px;
        height: 300px;
        border: 1px solid #ccc;
        padding: 10px;
        overflow-y: scroll;

        border-radius: 10px;
        background-color: white;

        img {
            width: 100px;
        }
    }

    .from-plantilla {
        max-width: 650px;
    }
</style>
<div class="conteiner">
    <h1>Crear plantillas</h1>
    <div class="from-plantilla">
        <form method="post" action="{{route('plantillas.store')}}">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nombre:</label>
                <div class="col-sm-10">
                    <input type="text" name="nombre" value="PlantillaN1" class="form-control-plaintext">
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Asunto</label>
                <div class="col-sm-10">
                    <input type="text" name="asunto" placeholder="ingrese asunto" class="form-control-plaintext" id="staticEmail">
                </div>
            </div>
            <div class="mb-3">
                <textarea rows="4" class="form-control" name="contenidoEmail" id="contenido-email"></textarea>
            </div>
            <div class="herramientas-email">
                <h5><button type="button" title="Negrita" onclick="Negrita()"><i class="fa-solid fa-b"></i></button></h5>
                <h5><button type="button" title="Italica" onclick="Italic()"><i class="fa-solid fa-italic"></i></button></h5>
                <h5><button type="button" title="Crear enlace" onclick="crearEnlace()"><i class="fa-solid fa-a"></i></button></h5>
                <h5><button type="button" title="Subrayar" onclick="subrayarTexto()"> <i class="fa-solid fa-subscript"></i></button></h5>
                <h5><button type="button" title="Insertar" onclick="insertarImagen()"><i class="fa-regular fa-image"></i></button></h5>
                <h5><i class="fa-solid fa-paperclip"></i></h5>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<script>
    async function ocultarCorreo() {
        let btn_ocult = document.getElementById("ocult-email");
        let conteiner_secret = document.getElementById("conteiner-secret")
        conteiner_secret.innerHTML = ""
    }
    async function Negrita() {
        //let btn = document.getElementById('fa-solid');
        let textarea = document.getElementById("contenido-email");
        // Alternar entre negrita y normal
        if (textarea.style.fontWeight === "bold") {
            textarea.style.fontWeight = "normal";
        } else {
            textarea.style.fontWeight = "bold";
        }
    }
    async function Italic() {
        let textarea = document.getElementById("contenido-email");
        if (textarea.style.fontStyle == "italic") {
            textarea.style.fontStyle = "normal"
        } else {
            textarea.style.fontStyle = "italic"
        }
    }

    function crearEnlace() {
        let url = prompt("Introduce la URL del enlace:");
        if (url) {
            document.execCommand("createLink", false, url);
        }
    }

    function subrayarTexto() {
        document.execCommand("underline", false, null); // Aplica subrayado al texto seleccionado
    }

    function insertarImagen() {
        let url = prompt("inserte la url de la imagen");
        if (url) {
            document.execCommand('insertImage', false, url);
        }
    }
</script>
@endsection