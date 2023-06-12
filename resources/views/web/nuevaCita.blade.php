@extends('web.layout')



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

        .cita {
            margin-top: 20px;
            margin-left: 40px;
        }

        .selected-cell {
            border: 2px solid red !important;
        }
    </style>
    <form method="POST" id="miFormulario" enctype="multipart/form-data" action='/citas/crear' onsubmit="return confirmarCita()">
        @csrf

        <!-- id paciente -->
        <input type="hidden" name="usuario" value="{{ Auth::user()->id }}">

        <!-- medico -->
        <input type="hidden" name="medico" value="{{ $medico }}">


        <div style="display:none;">
            <input type="datetime-local" id="fechaInicio" name="fechaInicio" min="<?php echo date('Y-m-d\TH:i'); ?>">
        </div>

        <input type="hidden" name="fechaHoraMas1h" id="fechaHoraMas1h">



        <input type="hidden" name="centro" value="{{ $centro->id }}">

        <button type="submit" class="cita btn btn-outline-success">Confirmar cita</button>

    </form>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'es', //idioma español
                initialView: 'timeGridWeek', //formato del calendario
                slotMinTime: '07:00:00', //horas que aparecen en el calendario
                slotMaxTime: '22:30:00',
                allDaySlot: false,
                validRange: {
                    start: '07:00', //solo acepta horas en ese umnral
                    end: '22:00'
                },
                aspectRatio: 1.5, //tamaño
                hiddenDays: [6, 0], //esconde sabados y domnigos
                events: @json($events), //pasa todos los objetos cita
                selectable: true, //para interactuar con las casillas

                selectOverlap: function(event) {
                    return false; // Evitar solapamiento de eventos
                },
                select: function(info) {
                    // Obtener la fecha y hora seleccionada
                    var fechaInicio = info.start;
                    var fechaFin = info.end;

                    // Formatear la fecha y hora en formato ISO8601
                    var fechaInicioISO = fechaInicio.toISOString().slice(0, 16);
                    var fechaFinISO = fechaFin.toISOString().slice(0, 16);

                    // Asignar los valores al campo de fecha y hora y al campo oculto

                    document.getElementById("fechaInicio").value = fechaInicioISO;
                    document.getElementById("fechaHoraMas1h").value = fechaFinISO;

                },
                //impide seleccionar un dia u hora anterior al actual
                selectAllow: function(selectInfo) {
                    // Obtener la fecha actual
                    var fechaActual = new Date();
                    // Comparar la fecha seleccionada con la fecha actual
                    if (selectInfo.start < fechaActual) {
                        return false; // No permitir selección
                    }
                    return true; // Permitir selección
                },
                //pone en gris las citas cuya fecha ha expirado
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
        });
    </script>

    <script>
        function confirmarCita() {
            var fechaInicio = document.getElementById("fechaInicio").value;
            if (!fechaInicio) {
                alert("Selecciona una hora en el calendario antes de confirmar la cita.");
                return false; // Cancelar el envío del formulario
            }
            return confirm("¿Estás seguro de que deseas crear la cita?");
        }
    </script>

    {{-- calendario --}}
    <div id="contenedor">
        <div id="calendar"></div>
    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src='fullcalendar/core/locales/es.global.js'></script>
    <script src='fullcalendar/core/index.global.js'></script>
@endpush
