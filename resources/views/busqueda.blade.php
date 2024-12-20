@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <style>
        .sugerencia {
            background-color: purple;
            padding: 5px;
            cursor: pointer;
            border-bottom: 1px solid #ddd;
        }

        .sugerencia:hover {
            background-color: #f0f0f0;
        }
    </style>
    <script>
        // Esta función simula la búsqueda de sugerencias en el backend (puedes adaptarlo para hacerlo dinámico desde el servidor)
        async function obtenerSugerencias() {
            try {
                const response = await fetch(`/sugerencias`);
                if (!response.ok) throw new Error("Error al obtener sugerencias");
                const sugerencias = await response.json();
                return sugerencias; // Retorna el listado completo de sugerencias
            } catch (error) {
                console.error("Error al obtener las sugerencias", error);
            }
        }

        async function buscarSugerencias(query) {
            // Obtiene todas las sugerencias al cargar (puedes mejorar para obtener solo la primera vez)
            const sugerencias = await obtenerSugerencias();

            // Filtra sugerencias en base al input
            if (query.length > 0) {
                const sugerenciasFiltradas = sugerencias.filter(sugerencia =>
                    sugerencia.toLowerCase().includes(query.toLowerCase())
                );

                mostrarSugerencias(sugerenciasFiltradas);
            } else {
                document.getElementById("sugerencias").innerHTML = "";
            }
        }

        function mostrarSugerencias(sugerencias) {
            const sugerenciasDiv = document.getElementById("sugerencias");
            sugerenciasDiv.innerHTML = "";

            if (sugerencias.length === 0) {
                sugerenciasDiv.style.display = 'none';
                return;
            }

            sugerenciasDiv.style.display = 'block';

            sugerencias.forEach(sugerencia => {
                const div = document.createElement("div");
                div.className = "sugerencia";
                div.innerText = sugerencia;

                div.onclick = function() {
                    document.getElementById("buscador").value = sugerencia;
                    window.location.href = `/${sugerencia}`;
                    sugerenciasDiv.innerHTML = "";
                };

                sugerenciasDiv.appendChild(div);
            });
        }
        document.addEventListener('click', function(e) {
            if (!e.target.matches('#buscador')) {
                document.querySelector('.sugerencias').style.display = 'none';
            }
        });
    </script>




    <h1>Buscador con Sugerencias</h1>

    <!-- Input de búsqueda -->
    <input type="text" id="buscador" placeholder="Escribe para buscar..." onkeyup="buscarSugerencias(this.value)">

    <!-- Div donde se mostrarán las sugerencias -->
    <div id="sugerencias" style="display: none; border: 1px solid #ddd; width: 300px;"></div>


</div>
@endsection