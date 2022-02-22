$(document).ready(function () {
    autocompleteApp();
    $('#loading').fadeOut('slow');
});

// Atributos
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

    // Evento para el botón de calcular
    $('#btn-calculate-route').click(function(event) {
        event.preventDefault();

        $('#loading').fadeToggle('slow', function() {
            $('.add-deliveries-div').toggle();
            calculateRoute();
            $('#loading').fadeToggle('slow');
        });
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

    deliveries.push(delivery);

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
            console.log('Funciona');
            $('#new-delivery').trigger("reset");
        },
        error: function(response) {
            alert('No funciona');
        }
    });
}

// Función calculateRoute() para calcular la ruta de todos los puntos indicados anteriormente
function calculateRoute() {
    var service = new google.maps.DirectionsService;

    var map = new google.maps.Map(document.getElementById('map'));
    window.gMap = map;

    // list of points
    var stations = updateStations();

    // list of points manual
    /* var stations = [
        {lat: deliveries[0].latitude, lng: deliveries[0].longitude, name: deliveries[0].name},
        {lat: deliveries[1].latitude, lng: deliveries[1].longitude, name: deliveries[1].name},
        {lat: deliveries[2].latitude, lng: deliveries[2].longitude, name: deliveries[2].name}
    ]; */

    // Zoom and center map automatically by stations (each station will be in visible map area)
    var lngs = stations.map(function(station) { return station.lng; });
    var lats = stations.map(function(station) { return station.lat; });
    map.fitBounds({
        west: Math.min.apply(null, lngs),
        east: Math.max.apply(null, lngs),
        north: Math.min.apply(null, lats),
        south: Math.max.apply(null, lats),
    });

    // Show stations on the map as markers
    for (var i = 0; i < stations.length; i++) {
        new google.maps.Marker({
            position: stations[i],
            map: map,
            title: stations[i].name
        });
    }

    // Divide route to several parts because max stations limit is 25 (23 waypoints + 1 origin + 1 destination)
    for (var i = 0, parts = [], max = 8 - 1; i < stations.length; i = i + max)
        parts.push(stations.slice(i, i + max + 1));

    // Service callback to process service results
    var service_callback = function(response, status) {
        if (status != 'OK') {
            console.log('Directions request failed due to ' + status);
            return;
        }
        var renderer = new google.maps.DirectionsRenderer;
        if (!window.gRenderers)
                window.gRenderers = [];
        window.gRenderers.push(renderer);
        renderer.setMap(map);
        renderer.setOptions({ suppressMarkers: true, preserveViewport: true });
        renderer.setDirections(response);
    };

    // Send requests to service to get route (for stations count <= 25 only one request will be sent)
    for (var i = 0; i < parts.length; i++) {
        // Waypoints does not include first station (origin) and last station (destination)
        var waypoints = [];
        for (var j = 1; j < parts[i].length - 1; j++)
            waypoints.push({location: parts[i][j], stopover: false});
        // Service options
        var service_options = {
            origin: parts[i][0],
            destination: parts[i][parts[i].length - 1],
            waypoints: waypoints,
            travelMode: 'DRIVING'
        };
        // Send request
        service.route(service_options, service_callback);
    }

    return true;
}

// Función updateStations() para preparar un array de objetos con los datos necesarios del calculo de rutas
function updateStations() {
    var stations = [];

    deliveries.forEach(delivery => {
        var station = {
            'lat': delivery['latitude'],
            'lng': delivery['longitude'],
            'name': delivery['name']
        };
        
        stations.push(station);
    });

    return stations;
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