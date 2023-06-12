<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sanitas Corner</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .card:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }

        img {
            width: 100%;
            height: 200px;
            border-radius: 8px;
            margin-bottom: 12px;
        }
    </style>

</head>

<body class="bg-white">
    <nav class="bg-gray-800 text-white">
        <div class="container mx-auto px-4 py-2 flex items-center justify-between">

            <a href="/" class="text-lg font-bold">
                Sanitas Corner
            </a>
            <div>
                {{-- <a href="{{ route('register') }}" class="ml-4">Register</a>
                <a href="{{ route('login') }}" class="ml-4">Login</a> --}}
                @auth
                    <a href="{{ url('/citas') }}" class="ml-4 font-semibold hover:text-gray-500">Citas</a>
                @else
                    <a href="{{ route('login') }}" class="ml-4 font-semibold hover:text-gray-500">Loguearse</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold hover:text-gray-500">Regístrate</a>
                    @endif
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mx-auto py-12 px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 justify-center items-center">
            <div class="p-6 bg-white rounded-lg shadow-md card">
                <img src="./storage/sanitas.png" alt="Card Image" class="mb-4 rounded-md">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Sanitas Corner</h2>
                <p class="text-gray-600">Sanitas Corner es una web que ofrece tanto unas instalaciones
                    como un personal
                    excelente, con un sistema de citas por medio de un calendario interactivo. Para mayor conocimiento
                    del centro al que quiera sacar cita, dispondrá de su ubicación vía maps, por otro lado, ofrecemos la
                    posibilidad de que filtre los centros segun sus necesidades, como centros que tenga servicio de
                    fisioterapia, oftalmología, etc.</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md card">
                <img src="./storage/personal.png" alt="Card Image" class="mb-4 rounded-md">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Personal especializado</h2>
                <p class="text-gray-600">Nuestros centros médicos cuentan con un equipo altamente cualificado de
                    profesionales de la salud que se dedican a brindar la mejor atención a nuestros pacientes. Desde
                    médicos especialistas y enfermeras experimentadas hasta técnicos y personal administrativo, cada
                    miembro de nuestro equipo desempeña un papel vital en el cuidado y bienestar de nuestros pacientes
                </p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md card">
                <img src="./storage/centro.png" alt="Card Image" class="mb-4 rounded-md">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Centros de alta</h2>
                <p class="text-gray-600">Nuestros centros médicos están diseñados para proporcionar un entorno seguro,
                    moderno y acogedor para nuestros pacientes. Contamos con instalaciones de vanguardia equipadas con
                    la última tecnología médica y recursos necesarios para ofrecer una amplia gama de servicios de
                    atención médica. Además, nos esforzamos por mantener altos estándares de limpieza e higiene en todas
                    nuestras instalaciones para crear un ambiente saludable.</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md card">
                <img src="./storage/cita.png" alt="Card Image" class="mb-4 rounded-md">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Cita médica</h2>
                <p class="text-gray-600">En nuestra página web, hemos implementado un sistema de reserva de citas en
                    línea para brindarle a nuestros pacientes la comodidad y facilidad de programar su visita médica.
                    Con tan solo unos clics, puede acceder a nuestro portal de citas y seleccionar el centro médico,
                    especialidad y médico de su preferencia. Nuestro sistema le mostrará los horarios disponibles para
                    que elija la fecha y hora que mejor se ajuste a su agenda.</p>
            </div>

        </div>
    </div>
</body>

</html>
