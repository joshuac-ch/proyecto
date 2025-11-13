@extends('layout.app')

@section('contenido')
<style>
    .btn-social-media {
        display: flex;
        justify-content: start;
        align-items: center;
        gap: 1rem;
        margin-left: 20px;
    }

    .boton-x {
        font-size: 15px;
        background-color: black;
        color: white;
        border: 0px;
        border-radius: 5px;
        padding: 0px 6px;
    }

    .boton-x:hover {
        color: white;
        filter: brightness(110%);
    }

    .face {
        font-size: 17px;
        padding: 1px 0px;

    }
</style>
<div class="conteiner" style="pointer-events: none">
    <h1>Redes Sociales</h1>
    <a href="" class="conectar">Conectar Cuenta</a>
    <a href="">Conectar a Facebook</a>
    @csrf
    <div class="btn-social-media">
        <div class="btn">
            <fb:login-button class="face"
                scope="public_profile,email"
                onlogin="checkLoginState();">
            </fb:login-button>
        </div>
        <div class="btn">
            <fb:login-button class="face"
                scope="pages_manage_posts,pages_read_engagement,pages_show_list"
                onlogin="checkLoginState();">
            </fb:login-button>
        </div>
        <div class="btn">
            <a href="/auth/twitter" class="boton-x"><i class="fa-brands fa-x-twitter"></i> Log In</a>
        </div>
    </div>
    <script>
        /*let saludo;

        function mifuncion() {
            saludo = setInterval(function() {
                console.log("hola mundo")
            }, 4000)
        }
        mifuncion()*/
    </script>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId: '1206935653696374',
                cookie: true,
                xfbml: true,
                version: 'v16.0'
            });

            FB.AppEvents.logPageView();

        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        // Comprueba el estado de autenticación
        function checkLoginState() {
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
        }
        // Obtén el token de acceso de la página
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
        // Crear una publicación en la página de la empresa
        function createPostOnPage(pageAccessToken) {
            var postContent = document.getElementById('postContent').value;

            if (postContent) {
                FB.api(
                    `/${pageID}/feed`, // Reemplaza `pageID` con el ID de tu página
                    'POST', {
                        message: postContent,
                        access_token: pageAccessToken
                    },
                    function(response) {
                        if (response && !response.error) {
                            console.log('Publicación exitosa:', response);
                            alert('Publicación realizada correctamente en la página');
                        } else {
                            console.error('Error al realizar la publicación en la página:', response.error);
                            alert('Error al realizar la publicación en la página');
                        }
                    }
                );
            } else {
                alert('Por favor, escribe algo para publicar en la página.');
            }
        }

        // Maneja el estado de autenticación (define este método para manejar el resultado)
        function statusChangeCallback(response) {
            if (response.status === 'connected') {
                console.log('Usuario conectado');
                getUserInfo()

            } else {
                console.log('Usuario no conectado');
            }
        }

        function getUserInfo() {
            FB.api('/me', {
                fields: "name,email,picture"
            }, function(response) {
                console.log("Info del usuario", response)
                //guar data

                localStorage.setItem('user', JSON.stringify(response));
                window.location.href = "admin"
            })
        };
    </script>

</div>
@endsection
