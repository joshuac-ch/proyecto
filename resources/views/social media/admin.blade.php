@extends('layout.app')

@section('contenido')
<div class="conteiner">
    <h1>Redes Sociales</h1>
    <h3>Administrar</h3>
    <h3>Lista</h3>
    <h4>Publicada</h4>
    <a href="{{route('social.publi')}}">Crear Publicacion</a>

    <div id="user-info">

    </div>
    <script>
        var user = JSON.parse(localStorage.getItem('user'));
        if (user) {
            // document.getElementById("user-info").innerHTML =
            //     `<div class="cuenta">            



            //<h3>Bienvenido ${user.name} </h3>
            //        <h3>Correo: ${user.email}</h3>
            //       <img src=${user.picture.data.url} alt="foto no encontrada"></>
            //        </div>`
            mostrarcuenta()

        } else {
            window.location.href = "index"
        }

        function getPageAccessToken() {
            FB.api('/me/accounts', function(response) {
                if (response && !response.error) {
                    console.log(response);
                    // Encuentra la página específica
                    let page = response.data.find(page => page.name === 'Nombre de tu página');
                    if (page) {
                        let pageAccessToken = page.access_token;
                        console.log('Token de acceso de la página:', pageAccessToken);

                        // Aquí puedes realizar publicaciones usando este token
                        createPostOnPage(pageAccessToken);
                    } else {
                        console.log('No se encontró la página');
                    }
                } else {
                    console.error('Error obteniendo las páginas:', response.error);
                }
            });
        }

        function mostrarcuenta() {
            var user = JSON.parse(localStorage.getItem('user'));
            if (user) {
                document.getElementById("user-info").innerHTML =
                    `<div class="cuenta">
                    <table class="table">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">#NOMBRE</th>
                    <th scope="col">#EMAIL</th>                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">${user.id}</th>
                    <td>${user.name}</td>
                    <td>${user.email}</td>
                    
                </tr>
            </tbody>
        </table>
                    
                    
                    </div>`

            } else {
                window.location.href = "index"
            }
        }
    </script>
</div>
@endsection