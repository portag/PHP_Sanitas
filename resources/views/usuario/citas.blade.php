@extends('usuario.layout')



@section('main')
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
    <style>
        #calendar {
            margin: 40px;
        }

        #contenedor {
            height: 600px;
            /* Establece una altura fija para el contenedor del calendario */
            overflow: auto;
            /* Añade scroll si el contenido del calendario excede el contenedor */
            margin-bottom: 163px;


        }

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
    </style>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'es',
                initialView: 'timeGridWeek',
                slotMinTime: '07:00:00',
                slotMaxTime: '22:30:00',
                allDaySlot: false,
                hiddenDays: [6, 0],
                events: @json($events),
                eventDidMount: function(info) {
                    // Obtener la fecha actual
                    var fechaActual = new Date();
                    // Comparar la fecha del evento con la fecha actual
                    if (info.event.start < fechaActual) {
                        info.el.style.backgroundColor =
                            'darkgray';
                    }
                },
            });
            calendar.render();
            calendar.updateSize()
        });
    </script>
    <div id="contenedor">
        <div id="calendar"></div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src='fullcalendar/core/locales/es.global.js'></script>
    <script src='fullcalendar/core/index.global.js'></script>
@endpush
