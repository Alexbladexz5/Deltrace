// Mostrar lista con todos los usuarios
$(document).ready(load);

function load() {
    var params = [];
    $.ajax({
        data: params,
        url: '/admin-panel/getUsers',
        type: 'get',

        success: function (response) {
            console.log("Funciona");


        },
        
        error: function (response) {
            console.log("No funciona");
        }

    })
}