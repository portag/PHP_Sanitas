<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sanitas Corner</title>
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
            color: #1a2b49;
        }

        .login-btn {
            border: 1px solid #d6e1ee;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            background-color: white;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .left {
            flex: 1;
            max-width: 50%;
        }

        .left h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .ad-card {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            padding: 1.5rem;
            margin: 1rem;
            max-width: 300px;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            transition: transform 0.2s ease;
        }

        .ad-card:hover {
            transform: scale(1.02);
        }

        .ad-card h3 {
            color: #1e3a5f;
            margin: 0;
        }

        .ad-card p {
            color: #444;
            font-size: 0.95rem;
        }

        .ad-card .badge {
            display: inline-block;
            background-color: #2e7d32;
            color: white;
            padding: 0.3rem 0.6rem;
            border-radius: 8px;
            font-size: 0.8rem;
            width: fit-content;
        }

        .ad-card button {
            background-color: #1976d2;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.9rem;
            align-self: flex-start;
        }

        .ad-card button:hover {
            background-color: #145ca4;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            padding: 10px;
        }

        .search-btn {
            padding: 0.8rem 2rem;
            background-color: #5a9bd8;
            color: white;
            border: none;
            border-radius: 12px;
            margin-top: 1rem;
            cursor: pointer;
        }

        .right {
            flex: 1;
            max-width: 45%;
            text-align: center;
        }



        .features {
            display: flex;
            justify-content: space-between;
            margin-top: 3rem;
            gap: 1rem;
            flex-wrap: wrap;
        }


        .feature-card {
            background-color: #1e3a5f;
            flex: 1 1 22%;
            padding: 1rem;
            border-radius: 16px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .feature-card img {
            width: 32px;
            height: 32px;
            margin-bottom: 0.5rem;
        }

        .footer {
            background-color: #1e3a5f;
            color: white;
            padding: 2rem 1rem 1rem;
            text-align: center;
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




        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .left,
            .right {
                max-width: 100%;
            }

            .form-card input,
            .form-card select {
                flex: 1 1 100%;
            }

            .features {
                flex-direction: column;
            }

            .feature-card {
                flex: 1 1 100%;
            }
        }

        p {
            font-size: large;
        }
    </style>
</head>

<body>

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

    <h1 style="text-align: center">Portal de anuncios</h1>

    <div class="card-container">
        @foreach ($noticias as $noticia)
            <div class="ad-card">
                <h3 style="text-align: center">{{ $noticia->titular }}</h3>
                <p>{{ $noticia->texto }}</p>

                <a href="/centros/{{ $noticia->centro_id }}">Ir
                    al centro <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                    </svg></a>

            </div>
        @endforeach
    </div>

    {{ $noticias->links() }}

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

</body>

</html>
