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
        {lat: 36.83807977014031,lng: -2.4513575764744995, name: 'Bombolone'},
        {lat: 36.850063097911566,lng: -2.446748891908438, name: 'Pastelería del Águila - La Tonta Mona'},
        {lat: 36.83932083278515,lng: -2.460195018366268, name: 'Don Croissant'},
        {lat: 36.83980156802376,lng: -2.4616330984981434, name: 'Confitería Capri'},
        {lat: 36.86026923300328,lng: -2.4447831054105635, name: 'Pastelería Mónica'}, 
        {lat: 36.85520617735452,lng: -2.4448249560187247, name: 'Taberna El Andaluz'},
        {lat: 36.85105353558606,lng: -2.4504598755250147, name: 'La Piedra Resto-Bar'},
        {lat: 36.85467973086508,lng: -2.4449001033221247, name: 'Tango Bar & Restaurante'},
        {lat: 36.84084402648873,lng: -2.4534771406459663, name: 'Bar Hammurabi'},
        {lat: 36.826350198321194,lng: -2.447190440017425, name: 'Kebab El Rachid'},
        {lat: 36.8219404016487,lng: -2.4427647026738697, name: 'La Dulce Alianza - Zapillo'},
        {lat: 36.83184327430669,lng: -2.4467639167849713, name: 'Karbon'},
        {lat: 36.83153729856263,lng: -2.4457477538289103,name: 'Restaurante La Pérgola'},
        {lat: 36.841507762141184,lng: -2.457778090185381,  name: 'Heladería Punto Italia'},
        {lat: 36.842704796761595,lng: -2.45879935653369,  name: 'La Flor de Valencia'},
        {lat: 36.84595650383804,lng: -2.4423874153025142, name: 'Indalpizza Almería'},
        {lat: 36.839051810566154,lng: -2.4511331365664764, name: 'Scondite Bar'},
        {lat: 36.838622096107784,lng: -2.4596820881548753, name: 'RAPA NUII'},
        {lat: 36.83953112080378,lng: -2.456453669243235,  name: 'Pub La Luna'},
        {lat: 36.850209338530235,lng: -2.445565869589346,  name: 'El Goloso de Almería'},
        {lat: 36.8394429800073,lng: -2.4488900844062567,  name: 'Hamburgueseria Milo'},
        {lat: 36.840138445331455,lng: -2.4643217586027077,  name: 'Milestone Restaurant & Bar'},
        {lat: 36.83773269159629,lng: -2.459436474207283,  name: 'Fosters Hollywood'},
        {lat: 36.845913068920325,lng: -2.4594845797654457,  name: 'Dogar Dogar Kebab - Rambla'},
        {lat: 36.841125378524524,lng: -2.4627964576667165,  name: 'Goiko'},
        {lat: 36.83806215288895,lng: -2.465276061388477,  name: 'Bar La Lupe'},
        {lat: 36.84114501215068,lng: -2.463968635641255,  name: 'La Dulce Alianza - Paseo'},
        {lat: 36.847570034048,lng: -2.445885267033654,  name: 'El Rincón de Basi'},
        {lat: 36.83818513701664,lng: -2.459917355972683,  name: 'La Dulce Alianza - Rambla'}
    ];

    var stations = calcularRuta(stations, ubicacionCercana);

    console.log(stations);
    
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
    for (var i = 0, parts = [], max = 25 - 1; i < stations.length; i = i + max) {
        parts.push(stations.slice(i, i + max));
    }

    console.log(parts);
    

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