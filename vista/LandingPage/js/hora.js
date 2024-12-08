// Obtén una referencia al campo de selección de hora
function horasdisponibles(horasOcupadas) {
    var appointmentTimeSelect = document.getElementById('hora');

    // Limpia todas las opciones existentes
    while (appointmentTimeSelect.options.length > 0) {
        appointmentTimeSelect.options.remove(0);
    }

    // Agrega la opción por defecto "Seleccione una hora"
    var defaultOption = document.createElement('option');
    defaultOption.text = 'Seleccione una hora';
    defaultOption.value = '';
    appointmentTimeSelect.appendChild(defaultOption);

    // Define las horas de inicio y fin del rango
    var startTime = 8; // 08:00 am
    var endTime = 18; // 06:00 pm

    // Genera las opciones de hora dentro del rango
    for (var hour = startTime; hour <= endTime; hour++) {
        var option = document.createElement('option');
        var timeLabel = (hour < 10 ? '0' : '') + hour + ':00 ' + (hour < 12 ? 'AM' : 'PM');

        // Agrega la hora a la lista solo si no está en las horas ocupadas
        if (!horasOcupadas.includes(timeLabel)) {
            option.text = timeLabel;
            option.value = timeLabel;
            appointmentTimeSelect.appendChild(option);
        }
    }

    // Destruye el componente nice-select existente y vuelve a aplicarlo
    $(appointmentTimeSelect).niceSelect('destroy').niceSelect();
}



// Ejemplo de función para actualizar el selector de horas
function actualizarSelectorHoras(horasOcupadas) {
    // Llama a la función para generar las opciones de horas disponibles
    horasdisponibles(horasOcupadas);
}



$(document).ready(function () {
    // Configura el datepicker
    /* $('.datepicker').datepicker({
         minDate: 0, // Impide seleccionar fechas pasadas
         maxDate: '+7d', // Limita la selección a los próximos 30 días
         beforeShowDay: function (date) {
             var dateString = $.datepicker.formatDate('yy-mm-dd', date);
             
             // Ejemplo: Obtén las horas ocupadas desde el servidor para la fecha actual
             var horasOcupadas = obtenerHorasOcupadas(dateString);
         }
     });*/

    // Maneja eventos cuando se selecciona una fecha
    $('.datepicker').on('change', function () {
        var fechaSeleccionada = $(this).val();
        // Obtén las horas ocupadas para la fecha seleccionada y actualiza el selector de horas
        obtenerHorasOcupadas(fechaSeleccionada);
    });
});

//función para verificar si una fecha está bloqueada
function isFechaBloqueada(fecha) {
    // Lógica para determinar si la fecha está bloqueada
    // Puedes implementar esto de acuerdo a cómo almacenas las citas en el servidor
    // Retorna true si la fecha está bloqueada, de lo contrario, retorna false
    return false; // Placeholder, debes implementar tu lógica aquí
}

//  función para obtener las horas ocupadas desde el servidor
function obtenerHorasOcupadas(fecha) {
    // Realiza una llamada AJAX al servidor para obtener las horas ocupadas

    // Utiliza $.ajax para realizar la llamada AJAX
    return $.ajax({
        url: "http://localhost/proyecto-IngWeb_ClinicaEstetica/?c=cita&a=cargarVistaCita&fecha=" + encodeURIComponent(fecha),
        dataType: 'json',
        method: 'POST',
        success: function (data) {
            // actualiza el selector de horas
            actualizarSelectorHoras(data);
        },
        error: function (error) {
            // Maneja los errores de la llamada AJAX aquí
            console.error("Error en la llamada AJAX", error);
        }
    });
}

// función para actualizar el selector de horas
function actualizarSelectorHoras(horasOcupadas) {
    // Llama a la función para generar las opciones de horas disponibles
    horasdisponibles(horasOcupadas);
}

// Ejemplo de cómo puedes usar la función
//var fechaSeleccionada = "12/12/2023"; // Debes obtener la fecha seleccionada de tu formulario

// Llama a la función obtenerHorasOcupadas y utiliza el resultado en el callback
// obtenerHorasOcupadas(fechaSeleccionada);



