$(document).ready(addAutocomplete);

function addAutocomplete() {
    // Se crea una barra de búsqueda para localizar una ubicación en el mapa
    var autocomplete = document.getElementById('autocomplete-app');

    const search = new google.maps.places.Autocomplete(autocomplete);
}