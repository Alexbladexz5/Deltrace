$(document).ready(autocompleteApp);

let deliveries = [];
let idRoute = 1;

function autocompleteApp() {
    // Se crea una barra de búsqueda para localizar una ubicación en el mapa
    var autocomplete = document.getElementById('autocomplete-app');

    const search = new google.maps.places.Autocomplete(autocomplete);

    // Crear evento para el botón de añadir entrega
    $('#btn-add-delivery').prop('disabled', true);

    google.maps.event.addListener(search, 'place_changed', function() {
        $('#btn-add-delivery').prop('disabled', false);
    });

    $('#btn-add-delivery').click(function(event) {
        event.preventDefault();

        var place = search.getPlace();

        createDelivery(place);
    });
}

function createDelivery(place) {
    var delivery = {
        'route_id': idRoute,
        'name': $('#name-app').val() || '',
        'address': place.formatted_address,
        'tracking_number': $('#tracking-number-app').val() || '',
        'latitude': place.geometry.location.lat(),
        'longitude': place.geometry.location.lng(),
        'name_address': place.name
    };

    console.log(delivery);
    console.log(place);

    deliveries.push(delivery);

    console.log(deliveries);

    // Crear llamada AJAX para almacenar la entrega en una ruta en la DB. Si funciona se almacena de forma local la entrega creada
    $.ajax({
        url: "app/createDelivery",
        type: "post",
        data: JSON.stringify(delivery),
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        },
        contentType: "application/json",
        success: function(response) {
            alert('Funciona');
        },
        error: function(response) {
            alert('No funciona');
        }
    });

}

// Recordatorio: crear una tabla con DataTables más adelante
function addDataTable() {
    if($.fn.DataTable) {
        $('.dt-app').DataTable({
            language: {
                url: '/libs/datatables/spanish.json'
            }
        });
    }
}