@extends('medico.layout')



@section('main')
    <style>
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin: 20px;
        }

        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-text {
            max-height: 350px;
            overflow: auto;
        }

        .card {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
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

        .separator {
            border: none;
            height: 2px;
            background-color: #333;
            margin: 10px 0;
        }
    </style>

    <h5 class="title">PORTAL DE ANUNCIOS</h5>
    <hr class="separator mx-3">



    <div class="card-container">


        @foreach ($noticias as $noticia)
            <div class="card" style="width: 400px;">
                <img src="{{ asset($noticia->imagen) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center;">{{ $noticia->titular }}</h5>
                    <p class="card-text">{{ $noticia->texto }}</p>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item"><a href="/centros/{{ $noticia->centro_id }}" class="btn btn-outline-info">Ir
                            al centro <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                            </svg></a>
                    </li>
                </ul>

            </div>
        @endforeach
        {{$noticias->links()}}
    </div>

    
@endsection
