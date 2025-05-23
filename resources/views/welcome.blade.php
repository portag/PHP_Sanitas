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

        .form-card {
            background-color: white;
            padding: 1rem;
            border-radius: 16px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-top: 1rem;
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .form-card input,
        .form-card select {
            padding: 0.7rem;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            flex: 1 1 45%;
        }

        .form-card input[type="date"] {
            cursor: pointer;
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

        .right img {
            max-width: 100%;
            height: auto;
            border-radius: 20px;
        }

        .features {
            display: flex;
            justify-content: space-between;
            margin-top: 3rem;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .feature-card {
            background-color: white;
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
            @auth
                <a href="{{ url('/citas') }}">Tus citas</a>
            @else
                <a href="{{ route('login') }}">Iniciar sesión</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Regístrate</a>
                @endif
            @endauth

        </nav>
    </header>

    <div class="container">
        <div class="left">
            <h1>Bienvenido al portal de Sanitas Corner!</h1>
            <p>Una vez que completes tu registro e inicies sesión, tendrás acceso a todos nuestros servicios médicos
                digitales.
                Podrás agendar tus citas de manera sencilla, seleccionar el centro de atención más cercano y elegir el
                departamento médico que mejor se adapte a tus necesidades.</p><br>
            <p>
                Además, tendrás la posibilidad de filtrar los centros disponibles según tus preferencias, ubicación o
                especialidad requerida, asegurando así una atención personalizada y eficiente.
            </p><br>
            <p>
                Nos comprometemos a brindarte una experiencia médica accesible, rápida y de calidad desde cualquier
                lugar.
                <br><em style="color: rgb(26, 123, 90)">Tu bienestar es nuestra prioridad, y estamos aquí para cuidarte.</em>
            </p>

        </div>

        <div class="right">
            <img src="./storage/doctora.png" alt="Doctor Image" />
        </div>
    </div>

    <div class="features">
        <div class="feature-card">
            <img src="https://img.icons8.com/ios-filled/50/000000/marker.png" alt="Find a Doctor" />
            <h4>Encuentra un doctor</h4>
            <p>Profesional cualificado</p>
        </div>
        <div class="feature-card">
            <img src="https://img.icons8.com/ios-filled/50/000000/planner.png" alt="Appointment" />
            <h4>Programa tus citas</h4>
            <p>Calendario interactivo</p>
        </div>
        <div class="feature-card">
            <img src="https://img.icons8.com/ios-filled/50/000000/money.png" alt="Qualified" />
            <h4>Servicio profesional</h4>
            <p>Instalaciones avanzadas</p>
        </div>
        <div class="feature-card">
            <img src="https://img.icons8.com/ios-filled/50/000000/clock.png" alt="24 Hours" />
            <h4>Servicio 24h</h4>
            <p>Disponibilidad completa</p>
        </div>
    </div>

</body>

</html>
