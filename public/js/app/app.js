$(document).ready(autocompleteApp);

var deliveries = [];

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
        'name': $('#name-app').val() || '',
        'tracking-number': $('#tracking-number-app').val() || '',
        'coordinates': {
            'lat': place.geometry.location.lat(),
            'lng': place.geometry.location.lng()
        },
        'place': place.formatted_address
    };

    console.log(delivery);

    deliveries.push(delivery);

    console.log(deliveries);
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