{{-- @extends('web.layout')



@section('main')
    <style>
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 109px;
            margin-bottom: 110px;
        }

        .form-wrapper {
            width: 100%;
            padding: 20px;
            margin: 0 100px;
            /* Agregar margen a los lados */
        }

        .form-wrapper h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .crear{
            margin-top: 20px;
        }
    </style>


    <div class="form-container">
        <div class="form-wrapper">
            <form method="POST" enctype="multipart/form-data" action='/centros/crear'>
                @csrf

                <h2>CREAR CENTRO</h2>

                <!-- Name -->
                <div class="mb-3">
                    <x-input-label for="nombre" :value="__('Nombre')" />
                    <x-text-input id="nombre" class="form-control" type="text" name="nombre" :value="old('nombre')" required
                        autofocus autocomplete="nombre" />
                    <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                </div>

                <!-- localidad -->
                <div class="mb-3">
                    <x-input-label for="localidad" :value="__('Localidad')" />
                    <x-text-input id="localidad" class="form-control" type="text" name="localidad" :value="old('localidad')"
                        required autofocus autocomplete="localidad" />
                    <x-input-error :messages="$errors->get('localidad')" class="mt-2" />
                </div>



                <!-- telefono -->
                <div class="mb-3">
                    <x-input-label for="telefono" :value="__('Telefono')" />
                    <x-text-input id="telefono" class="form-control" type="text" name="telefono" :value="old('telefono')"
                        required autofocus autocomplete="telefono" maxlength="9" />
                    <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                </div>


                <!-- imagen -->
                <div class="mb-3">
                    <x-input-label for="imagen" :value="__('Imagen')" />
                    <x-text-input id="imagen" class="form-control" type="file" name="imagen" :value="old('imagen')"
                        required autocomplete="imagen" />
                    <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
                </div>

                <x-input-label for="map" :value="__('Mapa')" />
                <div id="map" style="width: 100%; height:450px;">

                </div>

                <!-- latitud -->

                <x-text-input id="latitud" class="block mt-1 w-full" type="hidden" name="latitud" :value="old('latitud')"
                    required autofocus autocomplete="latitud" />




                <!-- longitud -->

                <x-text-input id="longitud" class="block mt-1 w-full" type="hidden" name="longitud" :value="old('longitud')"
                    required autofocus autocomplete="longitud" />


                <script src="https://api.mapbox.com/mapbox-gl-js/v2.5.0/mapbox-gl.js"></script>
                <link href="https://api.mapbox.com/mapbox-gl-js/v2.5.0/mapbox-gl.css" rel="stylesheet" />
                <script>
                    mapboxgl.accessToken = 'pk.eyJ1IjoicG9ydGl0YSIsImEiOiJjbGhweXg1bXkyM3kzM2VveDRrOWs1d2NuIn0.SjXn4zc_vBaPpwAEWH3r2Q';

                    var zoom = 10;

                    var map = new mapboxgl.Map({
                        container: 'map',
                        style: 'mapbox://styles/mapbox/outdoors-v12',
                        zoom: zoom
                    });

                    navigator.geolocation.getCurrentPosition(function(position) {
                        var latitude = position.coords.latitude;
                        var longitude = position.coords.longitude;

                        // Establecer el centro del mapa en la ubicación actual del usuario
                        map.setCenter([longitude, latitude]);
                    });


                    var currentMarker = null;
                    map.on('click', function(e) {
                        var latitud = e.lngLat.lat;
                        var longitud = e.lngLat.lng;
                        document.getElementById('latitud').value = latitud;
                        document.getElementById('longitud').value = longitud;

                        // Eliminar marcador anterior si existe
                        if (currentMarker) {
                            currentMarker.remove();
                        }

                        // Crear nuevo marcador
                        currentMarker = new mapboxgl.Marker({
                                color: "red"
                            })
                            .setLngLat([longitud, latitud])
                            .addTo(map);
                    });
                </script>




                <div class="crear text-center">
                    <button class="btn btn-outline-success" type="submit" name="enviar" texto="">Crear</button>
                </div>
            </form>

        </div>
    </div>
@endsection --}}
