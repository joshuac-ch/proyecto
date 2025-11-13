@extends('layout.app')

@section('contenido')
<style>
    .conteiner1 {
        width: 400px;
        margin: 50px auto;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
    }

    textarea {
        width: 100%;
        height: 100px;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 10px;
        box-sizing: border-box;
    }

    button {
        width: 100%;
        padding: 10px;
        background-color: #1DA1F2;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background-color: #0d8ecf;
    }

    #responseMessage {
        margin-top: 20px;
        text-align: center;
    }
</style>
<div class="conteiner1" style="pointer-events: none">

    <div class="container">
        <h1>Publicar un Tweet</h1>
        <form id="tweetForm">
            <textarea id="tweetText" placeholder="Escribe tu tweet aquí..." required></textarea>
            <button type="submit">Publicar Tweet</button>
        </form>
        <div id="responseMessage"></div>
    </div>



</div>
@endsection
