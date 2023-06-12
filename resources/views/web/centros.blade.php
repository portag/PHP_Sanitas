@extends('web.layout')



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
            margin-top: 30px;
            margin-left: 30px;
        }

        .tabla {
            margin-top: 100px;
            margin-bottom: 185px;
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
                <button class="btn btn-outline-warning d-flex" type="submit">Buscar<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg></button>
            </div>
        </form>



        <a href="/centros/nuevo" class=" btn btn-outline-success">Crear centro</a>
    </div>

    <div class="tabla">

        <table class="table table-light table-striped">
            <tr>
                <td>NOMBRE</td>
                <td>LOCALIDAD</td>
                <td>TELEFONO</td>
                <td>IMAGEN</td>
                <td>BOTONES</td>
            </tr>

            @foreach ($centros as $centro)
                <tr>
                    <td>{{ $centro->nombre }}</td>
                    <td>{{ $centro->localidad }}</td>
                    <td>{{ $centro->telefono }}</td>
                    <td> <img src="{{ asset($centro->imagen) }}" width="70px" height="70px"></td>
                    <td><a href="/centros/{{ $centro->id }}" class="btn btn-outline-info">D</a>
                        <a href="/centros/borrar/{{ $centro->id }}" class="btn btn-outline-danger">B</a>
                        <a href="/centros/noticias/{{ $centro->id }}" class="btn btn-outline-success">N</a>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
    {{$centros->links()}}
@endsection
