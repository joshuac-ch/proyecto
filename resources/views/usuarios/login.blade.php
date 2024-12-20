<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    html,
    body {
        overflow: hidden;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 100vw;


    }

    body::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100vh;
        /* Se ajusta al viewport */
        height: 100vw;
        /* Se ajusta al viewport */

        background-image: url('https://i.ibb.co/cLLdYbt/pixelcut-export.jpg');
        background-repeat: no-repeat;
        background-size: cover;

        background-position: center;
        transform: translate(-50%, -50%) rotate(90deg);
        /* Rotación horizontal */
        z-index: -1;
        /* Coloca la imagen detrás del contenido */
    }

    .contenedor {
        background: rgba(0, 0, 0, 0.6);
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 0px 30px black;
        backdrop-filter: blur(10px);
        border: 1px solid black;
        color: white;
        text-align: center;
        width: 400px;
    }

    .contenedor h1 {
        margin-bottom: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    form .form-label {
        text-align: left;
    }

    .registrarse {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .btn-primary {
        padding: 10px;
        background-color: white;
        border: none;
        border-radius: 10px;
        color: black;
        cursor: pointer;
        font-weight: bold;
        width: 100px;
    }

    .btn-primary:hover {
        background-color: purple;
    }

    a {
        color: white;
        text-decoration: none;
        font-weight: bold;
    }

    a:hover {
        text-decoration: underline;
    }

    .alert {
        margin-top: 15px;
    }

    .cartoon {
        position: absolute;
        /*top: 50%;
        left: 50%;
         animation: moveDiagonal 8s ease 1 forwards;
        */
        animation: moveDiagonal 8s ease 1 forwards;
        animation-delay: 3s;
        top: 100%;
        left: -50%;
        transform: translate(-50%, -50%);
        width: 50vmin;
        height: 50vmin;
        rotate: 90deg;
        /*animation: moveDiagonal 5s ease 1 forwards;
         top: 100%;
        left: -30%;*/


    }

    .cartoon2 {
        position: absolute;
        /*top: 50%;
        left: 50%;
        */
        animation: moveDiagonal 8s ease 1 forwards;
        animation-delay: 3s;
        top: 150%;
        left: -35%;
        transform: translate(-50%, -50%);
        width: 20vmin;
        height: 20vmin;
        rotate: 90deg;
        /*animation: moveDiagonal 5s ease 1 forwards;
         top: 100%;
        left: -30%;*/


    }

    .cartoon3 {
        position: absolute;
        /*top: 50%;
        left: 50%;
        */
        animation: moveDiagonal 8s ease 1 forwards;
        animation-delay: 3s;
        top: 110%;
        left: -30%;
        transform: translate(-50%, -50%);
        width: 30vmin;
        height: 30vmin;
        rotate: 90deg;
        /*animation: moveDiagonal 5s ease 1 forwards;
         top: 100%;
        left: -30%;*/


    }

    .cartoon4 {
        position: absolute;
        /*top: 50%;
        left: 50%;
        */
        animation: moveDiagonal 8s ease 1 forwards;
        animation-delay: 3s;
        top: 130%;
        left: -60%;
        transform: translate(-50%, -50%);
        width: 30vmin;
        height: 30vmin;
        rotate: 90deg;
        /*animation: moveDiagonal 5s ease 1 forwards;
         top: 100%;
        left: -30%;*/


    }


    @keyframes moveDiagonal {
        0% {

            display: block;
            transform: translate(0, 0);

        }

        50% {
            display: none;
            transform: translate(-150rem, -400rem);


        }

        75% {
            rotate: 90deg;

        }

        100% {
            display: none;
            transform: translate(0, 100);
            transform: rotate(180deg);
            rotate: 360deg;



        }
    }

    .cartoon div,
    .cartoon2 div,
    .cartoon3 div,
    .cartoon4 div {
        position: absolute;
        box-sizing: border-box;
    }

    .b {
        border: 0.5vmin solid;
    }

    .r {
        border-radius: 100%;
    }

    .hb::before,
    .ha::after {
        content: "";
        display: block;
        position: absolute;
        box-sizing: border-box;
    }

    /****/
    .cartoon,
    .cartoon2,
    .cartoon3,
    .cartoon4 {
        --body: #0d141d;
    }

    .antenna,
    .body {
        width: 4%;
        height: 4%;
        background: var(--body);
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .body::before {
        width: 60%;
        height: 1000%;
        background: var(--body);
        left: 50%;
        transform: translate(-50%, 0);
        border-radius: 50%;
    }

    .body::after {
        width: 150%;
        height: 400%;
        background: var(--body);
        top: 90%;
        left: 50%;
        transform: translate(-50%, 0);
        border-radius: 50%;
    }

    .antenna {
        box-shadow:
            -4.1vmin -9.1vmin 0 -1vmin var(--body),
            4.1vmin -9.1vmin 0 -1vmin var(--body);
    }

    .antenna::after,
    .antenna::before {
        width: 150%;
        height: 350%;
        border-radius: 50%;
        left: 80%;
        bottom: 20%;
        border: 0.25vmin solid transparent;
        border-left: 0.5vmin solid var(--body);
        transform: rotate(20deg);
    }

    .antenna::after {
        border-left: 0.5vmin solid transparent;
        border-right: 0.5vmin solid var(--body);
        transform: rotate(-20deg);
        left: -135%;
    }

    @keyframes wingTopFlap1 {

        0%,
        100% {
            transform: rotate(-50deg) rotate3d(0, 0, 0, 10deg);
        }

        50% {
            transform: rotate(-12deg) rotate3d(0, 1, 0, 10deg);
        }
    }

    @keyframes wingTopFlap2 {

        0%,
        100% {
            transform: scaleX(-1) rotate(-50deg) rotate3d(0, 0, 0, 10deg);
        }

        50% {
            transform: scaleX(-1) rotate(-12deg) rotate3d(0, 1, 0, 10deg);
        }
    }

    .wing-top {
        top: 5%;
        width: 50%;
        height: 45%;
        left: -0.125%;
        background: linear-gradient(black, #20a2ce);
        border-radius: 20% 100% 10% 80%;
        transform-origin: right bottom;
        transform: rotate(-12deg);
        box-shadow:
            inset 2vmin 1vmin 0 1vmin,
            inset -0.2vmin 0 0 1vmin;
        animation: wingTopFlap1 1s linear infinite;
        overflow: hidden;
    }

    .wing-top::after {
        width: 120%;
        height: 90%;
        border-radius: 50%;
        transform: rotate(35deg);
        left: 30%;
        top: -5%;
        box-shadow: inset .5vmin -1.8vmin;
    }

    .wing-top::before {
        width: 64%;
        height: 25%;
        transform: rotate(0deg);
        top: 61.5%;
        border-radius: 50% 50% 40% 60%;
        box-shadow: -1vmin -0.25vmin 0 1.5vmin;
    }

    .wing-top~.wing-top {
        left: 0;
        transform: scaleX(-1) rotate(-12deg);
        animation: wingTopFlap2 1s linear infinite;
    }

    .dots {
        width: 1vmin;
        height: 1vmin;
        background: white;
        color: white;
        left: 5%;
        top: 10%;
        box-shadow: -0.5vmin 3vmin,
            -0.5vmin 6vmin 0 0.125vmin,
            2.5vmin -2.0vmin white,
            3.5vmin -3vmin 0 -.5vmin,
            1vmin 15vmin 0 -0.5vmin white,

            20vmin 7vmin 0 2vmin transparent,
            20vmin 7.25vmin 0 3vmin transparent
    }

    @keyframes wingBottomFlap1 {

        0%,
        100% {
            transform: rotate(55deg) rotate3d(0, 0, 0, 10deg);
        }

        50% {
            transform: rotate(55deg) rotate3d(0, 1, 0, 10deg);
        }
    }

    @keyframes wingBottomFlap2 {

        0%,
        100% {
            transform: scaleX(-1) rotate(55deg) rotate3d(0, 0, 0, 10deg);
        }

        50% {
            transform: scaleX(-1) rotate(55deg) rotate3d(0, 1, 0, 10deg);
        }
    }

    .wing-bottom {
        width: 28%;
        height: 40%;
        background: linear-gradient(95deg, black, #20a2ce);
        border-radius: 100% / 125% 125% 70% 50%;
        transform-origin: right top;
        transform: rotate(55deg);
        top: 59%;
        left: 27.5%;
        box-shadow: inset .5vmin -2vmin 0 0.5vmin;
        animation: wingBottomFlap1 2s linear infinite;
        overflow: hidden;
    }

    .wing-bottom~.wing-bottom {
        transform: scaleX(-1) rotate(55deg);
        left: auto;
        right: 55.5%;
        animation: wingBottomFlap2 2s linear infinite;
    }

    .wing-bottom::before {
        width: 100%;
        height: 100%;
        left: 55%;
        top: -30%;
        border-radius: 50%;
        box-shadow: -1vmin 0.3vmin,
            -3vmin 2vmin 0 .5vmin #20a2ce,
            -3vmin 3vmin 0 1vmin
    }

    /*PARTE CENTRAL INFERIOR  */
    .wing-bottom::after {
        width: 1.5vmin;
        height: 1.5vmin;
        background: black;
        top: 70%;
        left: 15%;
        border-radius: 50%;
        box-shadow:
            2vmin -0.5vmin 0 -0.4vmin white,
            3vmin 1.5vmin 0 -0.5vmin white,
            6vmin -10vmin 0 .3vmin,
            8vmin -12vmin 0 -0.4vmin white;
    }
</style>

<body>
    <div class="cartoon hb">
        <div class="wing-bottom ha hb"></div>
        <div class="wing-top ha hb">
            <div class="dots r"></div>
        </div>
        <div class="wing-bottom ha hb"></div>
        <div class="wing-top ha hb">
            <div class="dots r"></div>
        </div>
        <div class="body r ha hb"></div>
        <div class="antenna r ha hb"></div>
    </div>
    <div class="cartoon2 hb">
        <div class="wing-bottom ha hb"></div>
        <div class="wing-top ha hb">
            <div class="dots r"></div>
        </div>
        <div class="wing-bottom ha hb"></div>
        <div class="wing-top ha hb">
            <div class="dots r"></div>
        </div>
        <div class="body r ha hb"></div>
        <div class="antenna r ha hb"></div>
    </div>
    <div class="cartoon3 hb">
        <div class="wing-bottom ha hb"></div>
        <div class="wing-top ha hb">
            <div class="dots r"></div>
        </div>
        <div class="wing-bottom ha hb"></div>
        <div class="wing-top ha hb">
            <div class="dots r"></div>
        </div>
        <div class="body r ha hb"></div>
        <div class="antenna r ha hb"></div>
    </div>
    <div class="cartoon4 hb">
        <div class="wing-bottom ha hb"></div>
        <div class="wing-top ha hb">
            <div class="dots r"></div>
        </div>
        <div class="wing-bottom ha hb"></div>
        <div class="wing-top ha hb">
            <div class="dots r"></div>
        </div>
        <div class="body r ha hb"></div>
        <div class="antenna r ha hb"></div>
    </div>



    <!--https://i.pinimg.com/736x/e8/35/5e/e8355e6bc3421cdc09e0fc38ab59b1d0.jpg-->

    <div class="contenedor">
        <form id="loginForm" action="{{route('veri.login')}}" method="post">
            @csrf
            <h1>Login</h1>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" required class="form-control" name="correo" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" required name="pass" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="registrarse">
                <button type="submit" id="submitButton" class="btn btn-primary">Ingresar</button>
                <a href="{{route('usuarios.create')}}">Registrarse</a>
            </div>
            <div id="errorAlert" class="alert alert-danger d-none" role="alert">
                Invalid credentials! Please try again.
            </div>
        </form>
    </div>
</body>
<script>
    let btn_login = document.getElementById("submitButton");
    let animation = document.querySelector(".cartoon");
    btn_login.addEventListener('click', function() {
        animation.style.display = "block";
        animation.style.opacity = 1;

    })

    function uno() {
        let carton = document.getElementById("cartoon");
        // animation: moveDiagonal 8 s ease 1 forwards;
        carton.style.animationName = moveDiagonal;
        carton.style.animationDuration = .8;
        carton.style.animationDelay = .5;

        carton.style.animationIterationCount = 1
        carton.style.animationFillMode = "forwards"
        carton.style.animationTimingFunction = "ease"
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>