@extends('medico.layout')



@section('main')
    <style>
        h3 {
            height: 100px;
            width: 150px;
            background-repeat: no-repeat;
            background-image: url("{{ asset($centro->imagen) }}");
            background-size: 10rem;
            text-align: center;
        }

        .centro {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin: 20px;
        }

        .imagen {
            width: 100%;
            height: 297px;
            object-fit: cover;
        }

        .usuario {
            transition: transform 0.3s ease;
        }

        .usuario:hover {
            transform: scale(1.05);
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


    <h5 class="title">DETALLES DEL CENTRO</h5>
    <hr class="separator mx-3">

    <div class="centro card-container">
        <div class="row">
            <div class="col-md-6">
                <div class="card" style="width: 500px;">
                    <!-- Contenido del card -->
                    <img src="{{ asset($centro->imagen) }}" class="imagen card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center;">{{ $centro->nombre }}</h5>
                    </div>
                    <ul class="list-group list-group-flush text-center">
                        <li class="list-group-item">
                            Localidad: {{ $centro->localidad }}
                        </li>
                        <li class="list-group-item">Teléfono: {{ $centro->telefono }}</li>
                        <li class="list-group-item">
                            @if (Auth::user()->especialidad != 'paciente')
                                <a href="/centros/{{ $centro->id }}/usuario/{{ Auth::user()->id }}"
                                    class="btn btn-outline-info">Inscribirse <svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-file-plus"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5V6z" />
                                        <path
                                            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" />
                                    </svg></a>
                            @endif
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
            </div>
            <div class="col-md-6">
                <div class="">
                    <div id="map" style="width: 500px; height:603px; border-radius:10px;">

                    </div>
                </div>
            </div>
        </div>
    </div>


    <h5 class="title">PLANTILLA DISPONIBLE</h5>
    <hr class="separator mx-3">





    <div class="card-container">
        @foreach ($usuarios as $usuario)
            <div class="usuario card" style="width: 300px;">
                <!-- Contenido del card -->
                <img src="{{ asset($usuario->imagen) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center;">{{ $usuario->name }}</h5>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item">Especialidad: {{ $usuario->especialidad }}</li>
                    <li class="list-group-item">
                        @if ($usuario->id == Auth::user()->id)
                            <a href="/centros/{{ $centro->id }}/usuario/{{ Auth::user()->id }}/borrar"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-x-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                </svg></a>
                        @endif
                        @if (Auth::user()->id != $usuario->id)
                            <form action="/citas/nueva/{{ $centro->id }}">
                                @csrf

                                <input type="hidden" name="medico" value="{{ $usuario->id }}">
                                <button type="submit" class="btn btn-outline-info">Consultar cita<svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-calendar-event" viewBox="0 0 16 16">
                                        <path
                                            d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
                                        <path
                                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                    </svg></button>
                            </form>
                        @endif
                    </li>
                </ul>
            </div>
        @endforeach
        {{ $usuarios->links() }}

    </div>




    <script src="https://api.mapbox.com/mapbox-gl-js/v2.5.0/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.5.0/mapbox-gl.css" rel="stylesheet" />
    <?php $urlImagen = $centro->imagen; ?>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoicG9ydGl0YSIsImEiOiJjbGhweXg1bXkyM3kzM2VveDRrOWs1d2NuIn0.SjXn4zc_vBaPpwAEWH3r2Q';
        var markers = [
            ['<?php echo $centro->nombre; ?>', {{ $centro->longitud }}, {{ $centro->latitud }}]
        ];
        var zoom = 10;

        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/outdoors-v12',

            //centra el mapa en la localizacion del marker
            center: [{{ $centro->longitud }}, {{ $centro->latitud }}],
            zoom: zoom
        });

        map.on('load', function() {
            for (var i = 0; i < markers.length; i++) {
                new mapboxgl.Marker()
                    .setLngLat([markers[i][1], markers[i][2]])
                    .setPopup(new mapboxgl.Popup().setHTML('<h3>' + markers[i][0] + '</h3>'))
                    .addTo(map);
            }
        });
    </script>
@endsection
