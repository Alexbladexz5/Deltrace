// Cuando el DOM esté cargado se iniciará la función del autocompletado, se oculta el efecto de carga, la vista del mapa y la vista de los puntos
$(document).ready(function () {
    autocompleteApp();
    initLocation();
    scannerModal();
    $(".map-section").toggle();
    $(".points-section").toggle(function () {
        $(".points-section")[0].style.setProperty(
            "display",
            "none",
            "important"
        );
    });
    $("#loading").fadeOut("slow");
});

// Atributos
let deliveries = []; // Variable que almacena los puntos que introduce el usuario
let idRoute = 1; // ID de la ruta que se utiliza. Es necesario para almacenar los datos en la DB
var parts = []; // Cuando se ejecute la función calculateRoute() se almacenará los puntos indicados anteriormente en un array bidimensional
var partsGoogle = []; // Se almacenan las respuestas que se mandan a Google Maps Directions. No se usa de momento, ya que se utiliza para debuggear

// Ubicación actual. En caso de no activar la geolocalización tendrá una ubicación por defecto para realizar la prueba
var ubicacionCercana = {
    lat: 36.839922,
    lng: -2.4497194,
    name: "Ubicación actual",
};

// Variables Google Maps API
var service = new google.maps.DirectionsService(); // Se invoca el servicio de direcciones de la API de Google Maps

// Función initLocation() para seleccionar la ubicación actual que se utilizará en la app
function initLocation() {
    // Opciones para la ventana modal
    var options = {
        backdrop: "static",
        keyboard: false,
    };

    // Se abre la ventana modal del autocompletado
    var modalAutocomplete = new bootstrap.Modal(
        document.getElementById("modal-autocomplete"),
        options
    );
    modalAutocomplete.show();

    // Se utiliza una barra de búsqueda para indicar la ubicación actual
    var autocomplete = document.getElementById("autocomplete-location");
    const searchLocation = new google.maps.places.Autocomplete(autocomplete);

    // Se desactiva el botón
    $("#btn-save-location").prop("disabled", true);

    // Si se selecciona una ubicación se activa el botón
    google.maps.event.addListener(searchLocation, "place_changed", function () {
        $("#btn-save-location").prop("disabled", false);
    });

    // Si se pulsa el botón se recoge la ubicación y se guarda la latitud y la longitud en la variable ubicacionCercana
    $("#btn-save-location").click(function (event) {
        event.preventDefault();
        var placeLocation = searchLocation.getPlace();
        ubicacionCercana.lat = placeLocation.geometry.location.lat();
        ubicacionCercana.lng = placeLocation.geometry.location.lng();
        modalAutocomplete.hide();
    });
}

function scannerModal() {
    // Opciones para la ventana modal
    var options = {
        backdrop: "static",
        keyboard: false,
    };

    // Se abre la ventana modal del scanner
    var modalScanner = new bootstrap.Modal(
        document.getElementById("modal-scanner"),
        options
    );

    // Evento en el botón para abrir la ventana modal
    $("#btn-scan-barcode").click(function (event) {
        event.preventDefault();
        // Iniciar scanner
        initScanner();
        modalScanner.show();
        
    });

    
}

function autocompleteApp() {
    // Se crea una barra de búsqueda para localizar una ubicación en el mapa
    var autocomplete = document.getElementById("autocomplete-app");
    const search = new google.maps.places.Autocomplete(autocomplete);

    // Crear evento para el botón de añadir entrega. No se puede pulsar hasta que no se seleccione un punto en el autocompletado
    $("#btn-add-delivery").prop("disabled", true);

    google.maps.event.addListener(search, "place_changed", function () {
        $("#btn-add-delivery").prop("disabled", false);
    });

    // Evento en el botón añadir punto
    $("#btn-add-delivery").click(function (event) {
        event.preventDefault();
        // Se comprueba que no esté vacio en los dos primeros campos del formulario. Si alguno está vacío se cancela la secuencia y se indica, con css, el input vacio
        if (
            $("#autocomplete-app").val() == "" ||
            $("#autocomplete-app").val() == null
        ) {
            $("#autocomplete-app").focus();
            $("#autocomplete-app").css({
                transform: "scaleX(1.05)",
                border: "3.5px dashed #CA0B00",
            });
            setTimeout(function () {
                $("#autocomplete-app").css({ transform: "", border: "" });
            }, 2000);
            return;
        }

        if ($("#name-app").val() == "" || $("#name-app").val() == null) {
            $("#name-app").focus();
            $("#name-app").css({
                transform: "scaleX(1.05)",
                border: "3.5px dashed #CA0B00",
            });
            setTimeout(function () {
                $("#name-app").css({ transform: "", border: "" });
            }, 2000);
            return;
        }

        // Se manda los datos del autocompletado
        var place = search.getPlace();
        //console.log(search);
        //if place is not defined, then launch a placed_changed event to force google to search for the place
        //if (place == undefined) {
        ///    google.maps.event.trigger(search, "place_changed");
        //    place = search.getPlace();
        //    console.log(place);
        //}
        //console.log(place);
        createDelivery(place);
    });

    // Evento para el botón de calcular
    $("#btn-calculate-route").click(function (event) {
        event.preventDefault();
        $("#loading").fadeToggle("slow", function () {
            $(".autocomplete-app").toggle();
            calculateRoute();
            $(".map-section").toggle();

            // Quitar loading
            $("#loading").fadeToggle("slow");
        });
    });
    
}

// Función createDelivery(place) para guardar de forma local y en la BD los datos de la entrega/punto
function createDelivery(place) {
    var delivery = {
        route_id: idRoute,
        name: $("#name-app").val() || "",
        address: place.formatted_address,
        tracking_number: $("#tracking-number-app").val() || "",
        latitude: place.geometry.location.lat(),
        longitude: place.geometry.location.lng(),
        name_address: place.name,
    };

    // Crear llamada AJAX para almacenar la entrega en una ruta en la DB. Si funciona se almacena de forma local la entrega creada
    $.ajax({
        url: "app/createDelivery",
        type: "post",
        data: JSON.stringify(delivery),
        headers: {
            "X-CSRF-TOKEN": $('input[name="_token"]').val(),
        },
        contentType: "application/json",
        success: function (response) {
            $("#new-delivery").trigger("reset"); // Se reinicia el formulario
            deliveries.push(delivery); // Se almacena en el array local que está como atributo
        },
        error: function (response) {
            alert("No funciona");
        },
    });
}

// Función calculateRoute() para calcular la ruta de todos los puntos indicados anteriormente
function calculateRoute() {
    // let labelIndex = 1; Se utiliza para enumerar los puntos (testeo)
    // SVG del icono de la ubicación actual
    const svgMarker = {
        path: "M10.453 14.016l6.563-6.609-1.406-1.406-5.156 5.203-2.063-2.109-1.406 1.406zM12 2.016q2.906 0 4.945 2.039t2.039 4.945q0 1.453-0.727 3.328t-1.758 3.516-2.039 3.070-1.711 2.273l-0.75 0.797q-0.281-0.328-0.75-0.867t-1.688-2.156-2.133-3.141-1.664-3.445-0.75-3.375q0-2.906 2.039-4.945t4.945-2.039z",
        fillColor: "blue",
        fillOpacity: 0.6,
        strokeWeight: 0,
        rotation: 0,
        scale: 2,
        anchor: new google.maps.Point(15, 30),
    };

    var map = new google.maps.Map(document.getElementById("map"));
    window.gMap = map;

    // Se guardan los puntos locales en la variable stations con los datos necesarios
    var stations = updateStations();

    // Ordenar los puntos desde la ubicación actual. Sirve para poder optimizar mejor la ruta si hay más de 24 puntos.
    var stations = calcularRuta(stations, ubicacionCercana);

    //console.log(ubicacionCercana);
    //console.log(stations);

    // Se crea un marcador con la ubicación actual
    new google.maps.Marker({
        position: ubicacionCercana,
        icon: svgMarker,
        map: map,
        title: ubicacionCercana.name,
    });

    // Zoom y mapa centrado automáticamente por cada punto (incluido origen)
    var lngs = stations.map(function (station) {
        return station.lng;
    });
    var lats = stations.map(function (station) {
        return station.lat;
    });
    lngs.push(ubicacionCercana.lng);
    lats.push(ubicacionCercana.lat);

    map.fitBounds({
        west: Math.min.apply(null, lngs),
        east: Math.max.apply(null, lngs),
        north: Math.min.apply(null, lats),
        south: Math.max.apply(null, lats),
    });

    // Se crean marcadores de cada punto
    for (var i = 0; i < stations.length; i++) {
        new google.maps.Marker({
            position: stations[i],
            //label: labelIndex++ + '', (testeo)
            map: map,
            title: stations[i].name,
        });
    }

    // Se divide la ruta completa en partes debido al número máximo de waypoints que se pueden enviar a la API de Google Maps. El límite es 25 8 (23 waypoints + 1 origen + 1 destino)
    for (var i = 0, max = 25 - 1; i < stations.length; i = i + max) {
        parts.push(stations.slice(i, i + max));
    }
    //console.log(parts);

    // Enviar solicitudes al servicio para obtener la ruta (para waypoints <= 25 solo se enviará una solicitud)
    for (
        var i = 0,
            originWaypoint = ubicacionCercana,
            destinationWaypoint = parts[0][parts[0].length - 1];
        i < parts.length;
        i++
    ) {
        if (i != 0) {
            originWaypoint = parts[i - 1][parts[i - 1].length - 1];
            destinationWaypoint = parts[i][parts[i].length - 1];
        }

        // En waypoints no se incluye la última estación (destino)
        var waypoints = [];
        for (var j = 0; j < parts[i].length - 1; j++) {
            waypoints.push({
                location: parts[i][j],
                stopover: true,
            });
        }

        // Opciones del servicio
        var service_options = {
            origin: originWaypoint,
            destination: destinationWaypoint,
            waypoints: waypoints,
            travelMode: "DRIVING",
            optimizeWaypoints: true,
        };

        // Posición del bucle (en este caso la posición del array parts)
        positionPart = i;

        // Se envian los parámetros y la posición del array parts que se está calculando
        sendRoute(service_options, map, positionPart);
    }

    // Evento para mostrar las rutas
    $("#btn-show-routes").click(function (event) {
        event.preventDefault();

        $("#loading").fadeToggle("slow", function () {
            $(".map-section").toggle();
            showListRoutes();
            $(".points-section").toggle();

            // Si todo ha funcionado
            $("#loading").fadeToggle("slow");
        });
    });

    //console.log(parts);

    return true;
}

// Función sendRoute() para mandar la ruta
function sendRoute(service_options, map, part) {
    service.route(service_options, function (response, status) {
        if (status == "OK") {
            // Si funciona se renderiza el mapa con las rutas
            var renderer = new google.maps.DirectionsRenderer();
            if (!window.gRenderers) {
                window.gRenderers = [];
            }

            window.gRenderers.push(renderer);
            renderer.setMap(map);
            renderer.setOptions({
                suppressMarkers: true,
                preserveViewport: true,
            });
            renderer.setDirections(response);

            var orders = response.routes[0].waypoint_order;
            var legs = response.routes[0].legs;
            //console.log(orders);

            // Se almacenan el orden de los puntos, el tiempo de llegada y la distancia en cada ruta
            for (var j = 0; j < parts[part].length; j++) {
                parts[part][j].waypoint_order = orders[j];
                parts[part][j].estimated_time = "" + legs[j].duration.text;
                parts[part][j].distance = "" + legs[j].distance.text;
            }

            // Se guardará lo siguiente:
            // Se guarda el último orden del último punto, ya que es el destino
            parts[part][parts[part].length - 1].waypoint_order = orders.length;

            // Se guarda el tiempo de llegada y los kilómetros de la ruta
            parts[part][parts[part].length - 1].estimated_time =
                "" + legs[legs.length - 1].duration.text;
            parts[part][parts[part].length - 1].distance =
                "" + legs[legs.length - 1].distance.text;

            // Sabiendo las posiciones se ordena
            parts[part].sort((a, b) =>
                a.waypoint_order > b.waypoint_order
                    ? 1
                    : b.waypoint_order > a.waypoint_order
                    ? -1
                    : 0
            );

            // Almacenar las respuestas
            partsGoogle[part] = response.routes[0];

            //console.log(response);
            //console.log(parts[part]);
            //console.log(legs[0].distance.text);
            //console.log(response.routes[0]);
        } else {
            console.log("Directions request failed due to " + status);
        }
    });
}

// Función showTableRoutes() para mostrar una lista con los enlaces a Google Maps
function showListRoutes() {
    // Listar todas las rutas
    var cont = 1;
    $list = ``;

    for (var i = 0; i < parts.length; i++) {
        parts[i].forEach((data) => {
            $list += `
            <li class="list-group-item d-flex justify-content-between align-content-center">
                <div class="d-flex flex-row">
                    <i class="fas fa-arrow-right arrow-position"></i>
                    <div class="ml-2">
                        <h6 class="mb-0">Entrega ${cont++}</h6>
                        <div class="about"> <span>${
                            data.distance
                        }</span> <span>${data.estimated_time}</span> </div>
                    </div>
                </div>
                <div class="url-route">
                    <a href="https://www.google.com/maps/dir/?api=1&travelmode=driving&layer=traffic&destination=${
                        data.lat
                    },${
                data.lng
            }" target="_blank" class="btn btn-circle float-right route-btn">
                        <i class="fas fa-map map-icon"></i>
                    </a>
                </div>
            </li>`;
        });
    }
    // Se añade el html
    $("#list-routes").append($list);
}

// Función updateStations() para preparar un array de objetos con los datos necesarios del calculo de rutas
function updateStations() {
    var stations = [];

    // Lista de puntos de prueba si no se indica nada en el autocompletado de puntos
    var stationsTest = [
        { lat: 36.83807977014031, lng: -2.4513575764744995, name: "Bombolone" },
        {
            lat: 36.850063097911566,
            lng: -2.446748891908438,
            name: "Pastelería del Águila - La Tonta Mona",
        },
        {
            lat: 36.83932083278515,
            lng: -2.460195018366268,
            name: "Don Croissant",
        },
        {
            lat: 36.83980156802376,
            lng: -2.4616330984981434,
            name: "Confitería Capri",
        },
        {
            lat: 36.86026923300328,
            lng: -2.4447831054105635,
            name: "Pastelería Mónica",
        },
        {
            lat: 36.85520617735452,
            lng: -2.4448249560187247,
            name: "Taberna El Andaluz",
        },
        {
            lat: 36.85105353558606,
            lng: -2.4504598755250147,
            name: "La Piedra Resto-Bar",
        },
        {
            lat: 36.85467973086508,
            lng: -2.4449001033221247,
            name: "Tango Bar & Restaurante",
        },
        {
            lat: 36.84084402648873,
            lng: -2.4534771406459663,
            name: "Bar Hammurabi",
        },
        {
            lat: 36.826350198321194,
            lng: -2.447190440017425,
            name: "Kebab El Rachid",
        },
        {
            lat: 36.8219404016487,
            lng: -2.4427647026738697,
            name: "La Dulce Alianza - Zapillo",
        },
        { lat: 36.83184327430669, lng: -2.4467639167849713, name: "Karbon" },
        {
            lat: 36.83153729856263,
            lng: -2.4457477538289103,
            name: "Restaurante La Pérgola",
        },
        {
            lat: 36.841507762141184,
            lng: -2.457778090185381,
            name: "Heladería Punto Italia",
        },
        {
            lat: 36.842704796761595,
            lng: -2.45879935653369,
            name: "La Flor de Valencia",
        },
        {
            lat: 36.84595650383804,
            lng: -2.4423874153025142,
            name: "Indalpizza Almería",
        },
        {
            lat: 36.839051810566154,
            lng: -2.4511331365664764,
            name: "Scondite Bar",
        },
        {
            lat: 36.838622096107784,
            lng: -2.4596820881548753,
            name: "RAPA NUII",
        },
        {
            lat: 36.83953112080378,
            lng: -2.456453669243235,
            name: "Pub La Luna",
        },
        {
            lat: 36.850209338530235,
            lng: -2.445565869589346,
            name: "El Goloso de Almería",
        },
        {
            lat: 36.8394429800073,
            lng: -2.4488900844062567,
            name: "Hamburgueseria Milo",
        },
        {
            lat: 36.840138445331455,
            lng: -2.4643217586027077,
            name: "Milestone Restaurant & Bar",
        },
        {
            lat: 36.83773269159629,
            lng: -2.459436474207283,
            name: "Fosters Hollywood",
        },
        {
            lat: 36.845913068920325,
            lng: -2.4594845797654457,
            name: "Dogar Dogar Kebab - Rambla",
        },
        { lat: 36.841125378524524, lng: -2.4627964576667165, name: "Goiko" },
        {
            lat: 36.83806215288895,
            lng: -2.465276061388477,
            name: "Bar La Lupe",
        },
        {
            lat: 36.84114501215068,
            lng: -2.463968635641255,
            name: "La Dulce Alianza - Paseo",
        },
        {
            lat: 36.847570034048,
            lng: -2.445885267033654,
            name: "El Rincón de Basi",
        },
        {
            lat: 36.83818513701664,
            lng: -2.459917355972683,
            name: "La Dulce Alianza - Rambla",
        },
    ];

    // Si hay puntos añadidos por el usuario se guardan los datos necesarios para la API de Google Maps
    if (deliveries.length > 0) {
        deliveries.forEach((delivery) => {
            var station = {
                lat: delivery["latitude"],
                lng: delivery["longitude"],
                name: delivery["name"],
            };

            stations.push(station);
        });
    } else {
        return stationsTest;
    }

    return stations;
}

/*
Código en pruebas para la geolocalización

function checkGeolocation() {
    if (navigator.geolocation) {
        return true;
    } else {
        alert('Active la geolocalización para que funcione el cálculo de rutas');
        return false;
    }
}

function activateGeolocation(callback) {
    // Comprobar si tiene la geolocalización activada
    if (navigator.geolocation) {
        // Si se activa la geolocalización se recoge las coordenadas actuales
        navigator.geolocation.getCurrentPosition((position) => {
            ubicacionCercana.lat = position.coords.latitude;
            ubicacionCercana.lng = position.coords.longitude;
            callback();
        });
    } else {
        alert("El navegador no soporta o no ha activado la geolocalización");
    }
}*/
