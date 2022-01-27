// Insertar Google Maps
function addMap() {
    const location = new Localizacion(()=>{
        // Se indica latitud y longitud de la ubicación actual
        const myLatLng = {
            lat: location.latitude,
            lng: location.longitude
        };

        // Opciones
        const options = {
            center: myLatLng,
            zoom: 12
        }

        var map = document.getElementById('map');
        
        // Se añade el mapa
        const mapa = new google.maps.Map(map, options);
        
        // Se crea un marcador en la posición actual por defecto
        const marker = new google.maps.Marker({
            position: myLatLng,
            map: mapa
        });

        // Se añade información al marcador creado anteriormente
        var infoMarker = new google.maps.InfoWindow();

        marker.addListener('click', function() {
            infoMarker.open(mapa, marker);
        });

        // Se crea una barra de búsqueda para localizar una ubicación en el mapa
        var autocomplete = document.getElementById('autocomplete');

        const search = new google.maps.places.Autocomplete(autocomplete);
        search.bindTo('bounds', mapa);

        search.addListener('place_changed', function() {
            infoMarker.close();
            marker.setVisible(false);

            // Se almacena el lugar indicado en el autocompletado
            var place = search.getPlace();

            // En el caso de que no pueda mostrarse
            if (!place.geometry.viewport) {
                window.alert("Error al mostrar el lugar");
            } else {
                // 
                if (place.geometry.viewport) {
                    mapa.fitBounds(place.geometry.viewport);
                } else {
                    mapa.setCenter(place.geometry.location);
                    mapa.setZoom(18);
                }
    
                marker.setPosition(place.geometry.location);
                marker.setVisible(true);
    
                var address = "";
                if (place.address_components) {
                    address = [
                        (place.address_components[0] && place.address_components[0].short_name || ''),
                        (place.address_components[1] && place.address_components[1].short_name || ''),
                        (place.address_components[2] && place.address_components[2].short_name || ''),
                    ];
                }
    
                infoMarker.setContent('<div><strong>' + place.name +'</strong><br/>' + address + '</div>');
                infoMarker.open(mapa, marker);
            }
        });

        // Añadir el evento "click" en el caso de que se pulse "Guardar". La acción dependerá de si se está usando para la modal crear o modificar
        $('#save-marker').mouseup(function() {
            $coordinates = [
                (marker.getPosition().lat()),
                (marker.getPosition().lng())
            ]
            if($('#save-marker').hasClass('create')) {
                $('#createDeliveryFrm #coordinates-create').val($coordinates);
                $('#save-marker').removeClass('create');
            } else if ($('#save-marker').hasClass('edit')) {
                $('#editDeliveryFrm #coordinates-edit').val($coordinates);
                $('#save-marker').removeClass('edit');
            }
            
            $('#addCoordinates').modal('hide');
        });
    });
}

class Localizacion {
    constructor(callback) {
        if (navigator.geolocation) {
            // Si se activa la geolocalización se utilizará las coordenadas actuales
            navigator.geolocation.getCurrentPosition((position) => {
                this.latitude = position.coords.latitude;
                this.longitude = position.coords.longitude;

                callback();
            });
        } else {
            alert("El navegador no soporta geolocalización");
        }
    }
}