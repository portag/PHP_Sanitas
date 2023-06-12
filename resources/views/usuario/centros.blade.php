@extends('usuario.layout')



@section('main')
    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-option {
            color: #333;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-option:hover {
            background-color: #f1f1f1;
        }

        .filtro {
            margin-bottom: 30px;
            margin-top: 30px;
            margin-left: 30px;
        }

       

        .card{
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin: 20px;
            margin-bottom: 126px;
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

    <h5 class="title">CENTROS DISPONIBLES</h5>
    <hr class="separator mx-3">


    {{-- filtrado de especialidad --}}
    <div class="filtro d-flex justify-content-center">
        <form action="/centros/filtro" class="w-50">
            <div class="d-flex align-items-center">
                <select name="especialidad" id="seleccion" class="form-select">
                    <option value="Fisioterapeuta">Fisioterapeuta</option>
                    <option value="Pediatra">Pediatra</option>
                    <option value="Cardiologo">Cardiologo</option>
                    <option value="Oftalmologo">Oftalmologo</option>
                    <option value="General">General</option>
                </select>
                <button class="btn btn-outline-primary d-flex" type="submit">Buscar<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg></button>
            </div>
        </form><br>

    </div>



    <div class="card-container">
        @foreach ($centros as $centro)
            <div class="card" style="width: 400px;">
                <img src="{{ asset($centro->imagen) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center;">{{ $centro->nombre }}</h5>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item">
                        Localidad: {{ $centro->localidad }}
                    </li>
                    <li class="list-group-item">Teléfono: {{ $centro->telefono }}</li>
                    <li class="list-group-item">
                        <a href="/centros/{{ $centro->id }}" class="btn btn-outline-primary">Portal del centro<svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                            </svg></a>
                        <a href="/centros/noticias/{{ $centro->id }}" class="btn btn-outline-success">Noticias<svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-newspaper" viewBox="0 0 16 16">
                                <path
                                    d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z" />
                                <path
                                    d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z" />
                            </svg></a>
                    </li>
                </ul>

            </div>
        @endforeach
        {{$centros->links()}}

    </div>
@endsection
