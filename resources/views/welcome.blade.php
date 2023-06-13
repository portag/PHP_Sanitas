<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sanitas Corner</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <style>
        .card:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }

        img {
            width: 100%;
            height: 400px;
            border-radius: 8px;
            margin-bottom: 12px;
        }

        a{
            text-decoration: none;
            color: white;
            padding-top: 10px;
            padding-bottom:10px;
            font-size: 20px;
        }
        
        p{
            font-size: 24px;
        }

        .mouse a:hover{
            background: linear-gradient(to top, rgba(0, 123, 255, 0.9), rgba(0, 123, 255, 0.3));
        }

        
       
    </style>

</head>

<body class="bg-white">
    <nav class="bg-primary">
        <div class="container mx-auto px-4 py-2 flex items-center justify-between">

            <a href="/" class="text-lg font-bold" style="font-size: 24px;">
                Sanitas Corner
            </a>
            <div class="mouse">
                {{-- <a href="{{ route('register') }}" class="ml-4">Register</a>
                <a href="{{ route('login') }}" class="ml-4">Login</a> --}}
                @auth
                    <a href="{{ url('/citas') }}" class="ml-4 font-semibold">Citas</a>
                @else
                    <a href="{{ route('login') }}" class="ml-4 font-semibold">Loguearse</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold">Regístrate</a>
                    @endif
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mx-auto py-12 px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 justify-center items-center">
            <div class="p-6 bg-white rounded-lg shadow-md card">
                <img src="./storage/sanitas.png" alt="Card Image" class="mb-4 rounded-md">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Sanitas Corner</h2>
                <p class="text-gray-600">Sanitas Corner es una web que ofrece tanto unas instalaciones
                    como un personal
                    excelente, con un sistema de citas por medio de un calendario interactivo. Para mayor conocimiento
                    del centro, dispondrá de su ubicación vía maps, por otro lado, ofrecemos la
                    posibilidad de que filtre los centros segun sus necesidades, por ejemplo, servicio de
                    fisioterapia.</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md card">
                <img src="./storage/personal.png" alt="Card Image" class="mb-4 rounded-md">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Personal especializado</h2>
                <p class="text-gray-600">Nuestros centros médicos cuentan con un equipo altamente cualificado de
                    profesionales de la salud que se dedican a brindar la mejor atención a nuestros pacientes. Desde
                    médicos especialistas y enfermeras experimentadas hasta técnicos y personal administrativo, cada
                    miembro de nuestro equipo desempeña un papel vital en el cuidado y bienestar de nuestros pacientes
                </p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md card">
                <img src="./storage/centro.png" alt="Card Image" class="mb-4 rounded-md">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Centros de alta</h2>
                <p class="text-gray-600">Nuestros centros médicos están diseñados para proporcionar un entorno seguro,
                    moderno y acogedor para nuestros pacientes. Contamos con instalaciones de vanguardia equipadas con
                    la última tecnología médica y recursos necesarios para ofrecer una amplia gama de servicios de
                    atención médica. Además, nos esforzamos por mantener altos estándares de limpieza e higiene en todas
                    nuestras instalaciones para crear un ambiente saludable.</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md card">
                <img src="./storage/cita.png" alt="Card Image" class="mb-4 rounded-md">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Cita médica</h2>
                <p class="text-gray-600">En nuestra página web, hemos implementado un sistema de reserva de citas en
                    línea para brindarle a nuestros pacientes la comodidad y facilidad de programar su visita médica.
                    Con tan solo unos clics, puede acceder a nuestro portal de citas y seleccionar el centro médico,
                    especialidad y médico de su preferencia. Nuestro sistema le mostrará los horarios disponibles para
                    que elija la fecha y hora que mejor se ajuste a su agenda.</p>
            </div>

        </div>
    </div>


    <footer class="foot text-center text-white bg-primary">
        <!-- Grid container -->
        <div class="container pt-4">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-link btn-floating btn-lg m-1 text-white" href="#!" role="button"><svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-facebook" viewBox="0 0 16 16">
                        <path
                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                    </svg></a>


                <!-- Google -->
                <a class="btn btn-link btn-floating btn-lg m-1 text-white" href="#!" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-envelope-at" viewBox="0 0 16 16">
                        <path
                            d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
                        <path
                            d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                    </svg>
                </a>

                <!-- messenger -->
                <a class="btn btn-link btn-floating btn-lg m-1 text-white" href="#!" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-messenger" viewBox="0 0 16 16">
                        <path
                            d="M0 7.76C0 3.301 3.493 0 8 0s8 3.301 8 7.76-3.493 7.76-8 7.76c-.81 0-1.586-.107-2.316-.307a.639.639 0 0 0-.427.03l-1.588.702a.64.64 0 0 1-.898-.566l-.044-1.423a.639.639 0 0 0-.215-.456C.956 12.108 0 10.092 0 7.76zm5.546-1.459-2.35 3.728c-.225.358.214.761.551.506l2.525-1.916a.48.48 0 0 1 .578-.002l1.869 1.402a1.2 1.2 0 0 0 1.735-.32l2.35-3.728c.226-.358-.214-.761-.551-.506L9.728 7.381a.48.48 0 0 1-.578.002L7.281 5.98a1.2 1.2 0 0 0-1.735.32z" />
                    </svg>
                </a>

                <!-- Linkedin -->
                <a class="btn btn-link btn-floating btn-lg m-1 text-white" href="#!" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-linkedin" viewBox="0 0 16 16">
                        <path
                            d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                    </svg>
                </a>

            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-white" style="font-size: 18px;" href="https://sanitasCorner.com/">SanitasCorner.com</a>
        </div>
        <!-- Copyright -->
    </footer>
</body>

</html>
