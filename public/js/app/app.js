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
    let labelIndex = 1;
    var service = new google.maps.DirectionsService;

    var map = new google.maps.Map(document.getElementById('map'));
    window.gMap = map;

    // Ubicación actual
    const ubicacionCercana = {
        name: 'Mi casa',
        lat: 36.839922,
        lng: -2.4497194,
      };

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
        {lat: 36.854688563504176, lng: -2.444906487615583, name: 'Tango Bar & Restaurante'},
        {lat: 36.84098232762707, lng: -2.4535272120963287, name: 'Bar Hammurabi'},
        {lat: 36.82638638945402, lng: -2.4471941763006795, name: 'Kebab El Rachid'},
        {lat: 36.82201880272507,lng: -2.4426187458168376, name: 'La Dulce Alianza - Zapillo'},
        {lat: 36.83185478617966,lng: -2.44675024114165, name: 'Karbon'},
        {lat: 36.83166140311982,lng: -2.445737773978449,name: 'Restaurante La Pérgola'},
        {lat: 36.84162060120711, lng: -2.457755945142126,  name: 'Heladería Punto Italia'},
        {lat: 36.84337183412822, lng: -2.4586786672090652,  name: 'La Flor de Valencia'},
        {lat: 36.84841480912949,lng: -2.4423285961074237, name: 'Indalpizza Almería'},
        {lat: 36.83925066994724, lng: -2.451207104666186, name: 'Scondite Bar'},
        {lat: 36.83875256513556, lng: -2.4596532739782115, name: 'RAPA NUII'},
        {lat: 36.839754228080245, lng: -2.45643154514218,  name: 'Pub La Luna'},
        {lat: 36.85051994939973, lng: -2.445555073977835,  name: 'El Goloso de Almería'},
        {lat: 36.83963328246964,lng: -2.448931818158191,  name: 'Hamburgueseria Milo'},
        {lat: 36.84030302157826, lng: -2.4643425604861604,  name: 'Milestone Restaurant & Bar'},
        {lat: 36.838635939705334, lng: -2.459428930299256,  name: 'Fosters Hollywood'},
        {lat: 36.846042652037596, lng: -2.459480402813959,  name: 'Dogar Dogar Kebab - Ramblo'},
        {lat: 36.841334850864236, lng: -2.4628358181581365,  name: 'Goiko'},
        {lat: 36.83821013939788, lng: -2.4652348874702383,  name: 'Bar La Lupe'},
        {lat: 36.84140327196071, lng: -2.463793631479271,  name: 'La Dulce Alianza - Paseo'},
        {lat: 36.84809446536914, lng: -2.4457497499293153,  name: 'El Rincón de Basi'},
        {lat: 36.838385184340495, lng: -2.4597879346382214,  name: 'La Dulce Alianza - Rambla'}
    ];

    var stations = calcularRuta(stations);

    // Zoom and center map automatically by stations (each station will be in visible map area)
    var lngs = stations.map(function(station) { return station.lng; });
    var lats = stations.map(function(station) { return station.lat; });
    map.fitBounds({
        west: Math.min.apply(null, lngs),
        east: Math.max.apply(null, lngs),
        north: Math.min.apply(null, lats),
        south: Math.max.apply(null, lats),
    });

    // Indicar ubicación actual
    new google.maps.Marker({
        position: ubicacionCercana,
        map: map,
        title: ubicacionCercana.name
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

    // Divide route to several parts because max stations limit is 8 (6 waypoints + 1 origin + 1 destination)
    for (var i = 0, parts = [], max = 24 - 1; i < stations.length; i = i + max) {
        parts.push(stations.slice(i, i + max + 1));
    }
        

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
    for (var i = 0, 
        originWaypoint = ubicacionCercana,
        destinationWaypoint = parts[0][parts[0].length - 1]; i < parts.length; i++) {
        if (i != 0) {
            originWaypoint = parts[i - 1][parts[i - 1].length - 1];
            destinationWaypoint = parts[i][parts[i].length - 1];
        }

        // Waypoints does not include last station (destination)
        var waypoints = [];
        for (var j = 0; j < parts[i].length - 1; j++) {
            if (i == 0 && j == 0) {
                j = 1;
            }

            waypoints.push({
                location: parts[i][j], 
                stopover: true
            });
        }
            
        // Service options
        var service_options = {
            origin: originWaypoint,
            destination: destinationWaypoint,
            waypoints: waypoints,
            travelMode: 'WALKING',
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