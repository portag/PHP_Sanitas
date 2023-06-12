@extends('web.layout')


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
        margin: 0 100px; /* Agregar margen a los lados */
    }

    .form-wrapper h2 {
        text-align: center;
        margin-bottom: 20px;
    }

</style>

<div class="form-container">
    <div class="form-wrapper">
        <form method="POST" enctype="multipart/form-data" action="/noticias/crear">
            @csrf

            <h2>CREAR NOTICIA</h2>

            <!-- titular -->
            <div class="mb-3">
                <x-input-label for="titular" :value="__('Titular')" />
                <x-text-input id="titular" class="form-control" type="text" name="titular" :value="old('titular')" required autofocus autocomplete="titular" />
                <x-input-error :messages="$errors->get('titular')" class="mt-2" />
            </div>

            <!-- texto -->
            <div class="mb-3">
                <x-input-label for="texto" :value="__('Texto')" />
                <textarea name="texto" id="texto" class="form-control" rows="5" required></textarea>
                <x-input-error :messages="$errors->get('texto')" class="mt-2" />
            </div>

            <!-- elegir centro noticia -->
            <div class="mb-3">
                <x-input-label for="centro" :value="__('Elegir centro noticia')" />
                <select name="centro" id="centro" class="form-control">
                    @foreach ($centros as $centro)
                        <option value="{{ $centro->id }}">{{ $centro->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- imagen -->
            <div class="mb-3">
                <x-input-label for="imagen" :value="__('Imagen')" />
                <x-text-input id="imagen" class="form-control" type="file" name="imagen" :value="old('imagen')" required autocomplete="imagen" />
                <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
            </div>

            <div class="text-center">
                <button class="btn btn-outline-success" type="submit" name="enviar" texto="">Crear</button>
            </div>
        </form>
    </div>
</div>

@endsection
