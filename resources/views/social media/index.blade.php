@extends('layout.app')

@section('contenido')
<style>
    .conectar {}
</style>
<div class="conteiner">
    <h1>Redes Sociales</h1>
    <a href="" class="conectar">Conectar Cuenta</a>
    <a href="">Conectar a Facebook</a>
    @csrf
    <fb:login-button
        scope="public_profile,email"
        onlogin="checkLoginState();">
    </fb:login-button>
    <fb:login-button
        scope="pages_manage_posts,pages_read_engagement,pages_show_list"
        onlogin="checkLoginState();">
    </fb:login-button>
    <!--<div id="user-info"></div>-->
    <script>
        const axios = require('axios');
        const BEARER_TOKEN = 'AAAAAAAAAAAAAAAAAAAAAB7OwQEAAAAAmXKM7XyZG0%2F19I%2BLf%2B9v5wJjwhA%3DTPqKKgFvBq1pgFvAjjqbldfkBnmCXVPdirzQutUFJLYe9K9Ytv';

        axios.post('https://api.twitter.com/2/tweets', {
            text: '¡Hola Mundo! Este es un tweet desde la API de Twitter.'
        }, {
            headers: {
                'Authorization': `Bearer ${BEARER_TOKEN}`,
                'Content-Type': 'application/json'
            }
        }).then(response => {
            console.log('Tweet publicado:', response.data);
        }).catch(error => {
            console.error('Error publicando el tweet:', error);
        });
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