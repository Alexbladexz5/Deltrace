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

        var delivery = {
            'name': place.name,
            'coordinates': {
                'lat': place.geometry.location.lat(),
                'lng': place.geometry.location.lng()
            }
        };

        console.log(delivery);

    });
}

function createDelivery() {
    
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