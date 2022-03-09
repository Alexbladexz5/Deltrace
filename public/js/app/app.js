$(document).ready(function () {
    autocompleteApp();
    $('#loading').fadeOut('slow');
    $('.map-section').toggle();
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
            $('.autocomplete-app').toggle();
            calculateRoute();
            $('.map-section').toggle();
            

            //Llamada a la función que muestra la lista
            
            

            // Si todo ha funcionado
            $('#loading').fadeToggle('slow');
        });
    });
}
function arraytoList() {
    var DirectionsService = new google.maps.DirectionsService();
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
    let labelIndex = 0;
    var service = new google.maps.DirectionsService;

    var map = new google.maps.Map(document.getElementById('map'));
    window.gMap = map;

    // list of points
    // var stations = updateStations();

    // list of points manual
    var stations = [
        {lat: 36.8380937415769, lng: -2.451354164303034, name: 'Bombolone'},
        {lat: 36.85009476292969, lng: -2.4467457663224828, name: 'Pastelería del Águila - La Tonta Mona'},
        {lat: 36.83933976659666, lng: -2.4601826277867804, name: 'Don Croissant'},
        {lat: 36.83979410289659, lng: -2.4616328805261736, name: 'Confitería Capri'},
        {lat: 36.86025637738461, lng: -2.4447880016370553, name: 'Pastelería Mónica'}, 
        {lat: 36.85519907724516, lng: -2.444838815654999, name: 'Taberna El Andaluz'},
        {lat: 36.85105648587925, lng: -2.450457498328358, name: 'La Piedra Resto-Bar'},
        {lat: 36.854688563504176, lng: -2.444906487615583, name: 'Tango Bar & Restaurante'}/*,
        {lat: 36.8410649, lng: -2.4531394, name: 'Bar Hammurabi'},
        {lat: 36.826342, lng: -2.4471747, name: 'Kebab El Rachid'},
        {lat: 36.8221608, lng: -2.4435294, name: 'La Dulce Alianza - Zapillo'},
        {lat: 36.8321486, lng: -2.4465911, name: 'Karbon'},
        {lat: 36.8320403, lng: -2.4464829, name: 'Restaurante La Pérgola'},
        {lat: 36.8416245, lng: -2.4576246, name: 'Heladería Punto Italia'},
        {lat: 36.851193, lng: -2.4509368, name: 'La Flor de Valencia'},
        {lat: 36.8457148, lng: -2.4430354, name: 'Indalpizza Almería'},
        {lat: 36.8390533, lng: -2.4522264, name: 'Scondite Bar'},
        {lat: 36.8386163, lng: -2.4602112, name: 'RAPA NUII'},
        {lat: 36.8393025, lng: -2.4563474, name: 'Pub La Luna'},
        {lat: 36.8501602, lng: -2.4456281, name: 'El Goloso de Almería'},
        {lat: 36.8394445, lng: -2.4499834, name: 'Hamburgueseria Milo'},
        {lat: 36.8404658, lng: -2.4661491, name: 'Milestone Restaurant & Bar'},
        {lat: 36.8392094, lng: -2.4601044, name: 'Fosters Hollywood'},
        {lat: 36.8459134, lng: -2.461032, name: 'Dogar Dogar Kebab - Ramblo'},
        {lat: 36.8420515, lng: -2.4631646, name: 'Goiko'},
        {lat: 36.8381317, lng: -2.4652535, name: 'Bar La Lupe'},
        {lat: 36.8410466, lng: -2.4643361, name: 'La Dulce Alianza - Paseo'},
        {lat: 36.847436, lng: -2.4472742, name: 'El Rincón de Basi'},
        {lat: 36.8379769, lng: -2.4597346, name: 'La Dulce Alianza - Rambla'}*/
    ];

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
            label: labelIndex++ + '',
            map: map,
            title: stations[i].name
        });
    }

    // Divide route to several parts because max stations limit is 25 (23 waypoints + 1 origin + 1 destination)
    for (var i = 0, parts = [], max = 8 - 1; i < stations.length; i = i + max)
        parts.push(stations.slice(i, i + max + 1));

    // Service callback to process service results
    var service_callback = function(response, status) {
        if (status == 'OK') {
            var renderer = new google.maps.DirectionsRenderer;
            if (!window.gRenderers) {
                window.gRenderers = [];
            }

            window.gRenderers.push(renderer);
            renderer.setMap(map);
            renderer.setOptions({ suppressMarkers: true, preserveViewport: true });
            renderer.setDirections(response);

            console.log(response);
        } else {
            console.log('Directions request failed due to ' + status);
        }
    };

    // Send requests to service to get route (for stations count <= 25 only one request will be sent)
    for (var i = 0; i < parts.length; i++) {
        // Waypoints does not include first station (origin) and last station (destination)
        var waypoints = [];
        for (var j = 1; j < parts[i].length - 1; j++)
            waypoints.push({
                location: parts[i][j], 
                stopover: true
            });
            
        // Service options
        var service_options = {
            origin: parts[i][0],
            destination: parts[i][0],
            waypoints: waypoints,
            travelMode: 'DRIVING',
            optimizeWaypoints: true
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