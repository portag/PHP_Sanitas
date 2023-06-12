@extends('web.layout')



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

        .detalle {
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .plantilla {
            margin-top: 30px;
            margin-bottom: 30px;
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

    <div class="detalle">
        <h5 class="title">DETALLE DEL CENTRO</h5>
        <hr class="separator mx-3">

        <table class="tabla table table-light table-striped">
            <tr>
                <td>NOMBRE</td>
                <td>LOCALIDAD</td>
                <td>TELEFONO</td>
                <td>IMAGEN</td>
                <td>BOTONES</td>
            </tr>

            <tr>
                <td>{{ $centro->nombre }}</td>
                <td>{{ $centro->localidad }}</td>
                <td>{{ $centro->telefono }}</td>
                <td> <img src="{{ asset($centro->imagen) }}" width="70px" height="70px"></td>

                <td><a href="/centros/{{ $centro->id }}/usuario/{{ Auth::user()->id }}"
                        class="btn btn-outline-info">+</a>
                    <a href="/centros/noticias/{{ $centro->id }}" class="btn btn-outline-success">N</a>
                </td>

            </tr>

        </table>
    </div>



    <div id="map" style="width: 100%; height:450px;"></div>

    <div class="plantilla">
        <h5 class="title">PLANTILLA DEL CENTRO</h5>
        <hr class="separator mx-3">

        <table class="table table-light table-striped">
            <tr>
                <td>NOMBRE</td>
                <td>EMAIL</td>
                <td>ESPECIALIDAD</td>
                <td>OTROS</td>
            </tr>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->especialidad }}</td>

                    <td class="d-flex">
                        @if (Auth::user()->id != $usuario->id)
                            <form action="/citas/nueva/{{ $centro->id }}">
                                @csrf

                                <input type="hidden" name="medico" value="{{ $usuario->id }}">
                                <button type="submit" class="btn btn-outline-info">Cita</button>
                            </form>
                        @endif
                        <a href="/centros/{{ $centro->id }}/usuario/{{ $usuario->id }}/borrar"
                            class="btn btn-outline-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                            </svg></a>


                    </td>
                </tr>
            @endforeach
        </table>
    </div>

{{$usuarios->links()}}




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
