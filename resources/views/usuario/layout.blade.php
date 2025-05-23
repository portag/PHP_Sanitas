<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<!--<h4 class="title"><a href="">@yield('titulo')</a></h4>-->
<style>
    a {
        text-decoration: none
        
    }

    body {
        background-color: whitesmoke;
        min-height: 100vh;
        /* Establece la altura mínima del cuerpo para ocupar al menos el 100% del viewport */
        display: flex;
        flex-direction: column;
    }

    .foot {
        margin-top: auto;
    }

    nav {
        font-size: 18px;
    }

    .mouse a:hover {
        background: linear-gradient(to top, rgba(0, 123, 255, 0.9), rgba(0, 123, 255, 0.3));
    }

    footer {
        font-weight: bold;
    }

    .contenedor {
        padding-top: 2px;
        padding-bottom: 2px;
    }

    .footer {
        background-color: #1e3a5f;
        color: white;
        padding: 2rem 1rem 1rem;
        text-align: center;
        margin-top: 190px;
    }

    .footer-features {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 2rem;
        margin-bottom: 1.5rem;
    }

    .footer .feature-card {
        max-width: 200px;
        text-align: center;
    }

    .footer .feature-card img {
        width: 40px;
        margin-bottom: 0.5rem;
    }

    .footer .feature-card h4 {
        margin: 0.5rem 0 0.2rem;
        font-size: 1.1rem;
        color: #ffffff;
    }

    .footer .feature-card p {
        font-size: 0.9rem;
        color: #ffffff;
    }

    .footer-bottom {
        border-top: 1px solid #ffffff22;
        padding-top: 1rem;
        font-size: 0.85rem;
        color: #ccc;
    }
</style>

<body class="">
    <header>
        <div class="logo">Sanitas Corner</div>
        <nav>

            <a href="{{ url('/citas') }}">Tus citas</a>
            <a href="{{ url('/centros') }}">Centros</a>
            <a href="{{ url('/noticias') }}">Anuncios</a>
            <a href="{{ url('/profile') }}">Perfil</a>
            <a href="{{ url('/') }}">Portal</a>
        </nav>
    </header>

    @yield('main')

    <footer class="footer">
        <div class="footer-features">
            <div class="feature-card">
                <img src="https://img.icons8.com/ios-filled/50/000000/marker.png" alt="Ubicación" />
                <h4>Ubicación Central</h4>
                <p>Centros en todo el país</p>
            </div>
            <div class="feature-card">
                <img src="https://img.icons8.com/ios-filled/50/000000/phone.png" alt="Contacto" />
                <h4>Atención al Cliente</h4>
                <p>Soporte 24/7 para tus citas</p>
            </div>
            <div class="feature-card">
                <img src="https://img.icons8.com/ios-filled/50/000000/lock.png" alt="Seguridad" />
                <h4>Privacidad Garantizada</h4>
                <p>Tus datos están protegidos</p>
            </div>
            <div class="feature-card">
                <img src="https://img.icons8.com/ios-filled/50/000000/heart-health.png" alt="Compromiso" />
                <h4>Comprometidos con tu salud</h4>
                <p>Cuidamos de ti siempre</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Sanitas Corner. Creador: Emilio David Porta García</p>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>



    @stack('scripts')
</body>

</html>
