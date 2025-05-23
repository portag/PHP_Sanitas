@extends('usuario.layout')



@section('main')
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background-color: #f9fbfd;
            padding: 2rem;
            color: #1a2b49;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .logo {
            font-weight: bold;
            font-size: 1.5rem;
        }

        nav a {
            margin: 0 1rem;
            text-decoration: none;
            color: #1d1d1d;
        }

        .card {
            margin-bottom: 20px;
            margin-left: 10px;
            margin-right: 10px;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin: 20px;
        }

        .card-img-top {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }


        .noticias {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin: 20px;
        }


        .imagen {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .title {
            text-align: center;
            margin-top: 60px;
            font-size: 28px;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .card-text {
            max-height: 350px;
            overflow: auto;
        }

        .sombra {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        .separator {
            border: none;
            height: 2px;
            background-color: #333;
            margin: 10px 0;
        }

        h1 {
            text-align: center;
            padding: 20px;
        }
    </style>



    <h1>Anuncios de {{ $centro->nombre }}</h1>


    <div class="card-container">

        <ul class="list-group list-group-flush text-center">

            <li class="list-group-item">
                <a href="/centros/{{ $centro->id }}" class="btn btn-outline-primary">Portal del centro<svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                    </svg></a>
            </li>

        </ul>


    </div>


    <div class="noticias card-container">

        @foreach ($noticias as $noticia)
            <div class="sombra card" style="width: 400px;">
                <img src="{{ asset($noticia->imagen) }}" class="imagen card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title" style="text-align:center;">{{ $noticia->titular }}</h5>
                    <p class="card-text">{{ $noticia->texto }}</p>
                </div>
            </div>
        @endforeach
        {{ $noticias->links() }}

    </div>
@endsection
