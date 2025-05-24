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


        /* Estructura principal */
        .page-container {
            display: flex;
            flex-direction: column;
            flex: 1;
            padding: 2rem 2rem 1rem;

        }

        /* Sección superior: Centro médico */
        .centro-section {
            display: flex;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .centro-card {
            flex: 1;
            background-color: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            display: flex;
            flex-direction: column;
            /* Añadido para estructura vertical */
        }

        .centro-card img {
            width: 100%;
            height: auto;
            /* Cambiado de height fijo a auto */
            object-fit: contain;
            /* Cambiado de 'cover' a 'contain' para ver imagen completa */
            display: block;
            max-height: 300px;
            /* Límite máximo pero mantiene proporciones */
        }

        .centro-content {
            padding: 1.5rem;
        }

        .centro-content h2 {
            margin-bottom: 0.5rem;
            font-size: 1.8rem;
            color: #333;
        }

        .centro-content p {
            margin-bottom: 0.5rem;
            color: #555;
        }

        /* Sección de filtro */
        .filtro-section {
            background: #fff;
            padding: 1.5rem;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .filtro-especialidad-form {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .filtro-especialidad-form label {
            font-weight: bold;
            font-size: 1.1rem;
        }

        .filtro-especialidad-form select {
            padding: 0.6rem;
            border-radius: 8px;
            border: 1px solid #ccc;
            flex-grow: 1;
            max-width: 300px;
        }

        .filtro-especialidad-form button {
            padding: 0.6rem 1.5rem;
            border: none;
            border-radius: 8px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: 0.3s;
        }

        .filtro-especialidad-form button:hover {
            background-color: #0069d9;
        }

        /* Sección de médicos */
        .doctores-section {
            background: #fff;
            padding: 1.5rem;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 1rem;
            /* Reducido de 2rem a 1rem */
        }

        .doctores-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .doctor-card {
            display: flex;
            background: #fff;
            border: 1px solid #eee;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            align-items: stretch;
            height: 100%;
            min-height: 140px;
            width: 100%;
        }

        .doctor-card img {
            width: 90px;
            height: 90px;
            object-fit: cover;
            border-radius: 50%;
            margin-right: 10px;
        }

        .doctor-info {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .doctor-info h3 {
            margin-bottom: 0.3rem;
            font-size: 1.2rem;
        }

        .doctor-info p {
            margin-bottom: 0.5rem;
            color: #666;
            font-size: 0.95rem;
        }

        .doctor-actions {
            display: flex;
            align-items: flex-end;
            margin-left: 1rem;
        }

        .doctor-actions button {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 6px;
            text-align: center;
            background-color: #17a2b8;
            color: white;
            cursor: pointer;
            transition: 0.2s;
            white-space: nowrap;
            width: 120px;
        }

        .doctor-actions button:hover {
            background-color: #138496;
        }

        /* Paginación */
        .pagination-container {
            margin-top: 1rem;
            display: flex;
            justify-content: center;
            padding-bottom: 1rem;
        }
    </style>

    <div class="page-container">
        <!-- Sección del centro médico -->
        <section class="centro-section">
            <div class="centro-card">
                <img src="{{ asset($centro->imagen) }}" alt="Imagen del centro médico">
                <div class="centro-content">
                    <h2>{{ $centro->nombre }}</h2>
                    <p>Dirección: {{ $centro->localidad }}</p>
                    <p>Teléfono: {{ $centro->telefono }}</p>
                </div>
            </div>
        </section>

        <!-- Sección de filtro -->
        <section class="filtro-section">
            <form method="GET" action="/medicos/filtro/{{ $centro->id }}" class="filtro-especialidad-form">
                <label for="especialidad">Filtrar por especialidad:</label>
                <select name="especialidad" id="seleccion">
                    <option value="Fisioterapeuta">Fisioterapeuta</option>
                    <option value="Pediatra">Pediatra</option>
                    <option value="Cardiologo">Cardiologo</option>
                    <option value="Oftalmologo">Oftalmologo</option>
                    <option value="General">General</option>
                </select>
                <button type="submit">Filtrar</button>
            </form>
        </section>

        <!-- Sección de médicos -->
        <section class="doctores-section">
            <h2>Nuestros Doctores</h2>
            <div class="doctores-grid">
                @foreach ($usuarios as $usuario)
                    @if (Auth::user()->id != $usuario->id)
                        <div class="doctor-card">
                            <img src="{{ asset($usuario->imagen) }}" alt="Foto de {{ $usuario->name }}">
                            <div class="doctor-info">
                                <h3>{{ $usuario->name }}</h3>
                                <p>Especialidad: {{ $usuario->especialidad }}</p>
                            </div>
                            <div class="doctor-actions">
                                <form action="/citas/nueva/{{ $centro->id }}">
                                    @csrf
                                    <input type="hidden" name="medico" value="{{ $usuario->id }}">
                                    <button type="submit" style="margin-right: 10px;">Consultar cita</button>
                                </form>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>

        <!-- Paginación -->
        <div class="pagination-container">
            {{ $usuarios->links() }}
        </div>
    </div>
@endsection
