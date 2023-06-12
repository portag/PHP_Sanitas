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
    </style>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'es',
                initialView: 'timeGridWeek',
                slotMinTime: '07:00:00',
                slotMaxTime: '22:00:00',
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
