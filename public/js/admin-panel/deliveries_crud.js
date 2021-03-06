// Mostrar lista con todas las rutas
$(document).ready(load);

function load() {
    var urlAjax = '/admin-panel/getDeliveries';
    var params = [];
    var aux = $('#idRoute').text();
    
    // Se realiza un if para comprobar si hay que buscar las entregas de una ruta
    if ($('#idRoute').text() != undefined && $('#idRoute').text() != '') {
        
        urlAjax = `/admin-panel/getDeliveries/${aux}`;
    }

    $.ajax({
        data: params,
        url: urlAjax,
        type: 'get',

        success: function (response) {
            // Si funciona se crea una tabla con todas las entregas
            $table = `
                <div class="card">
                    <div class="card-body">
                        <table id="dt-deliveries" class="table table-striped table-bordered table-responsive-md dts">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">ID Ruta</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Dirección</th>
                                    <th class="text-center">Número de seguimiento</th>
                                    <th class="text-center">Latitud</th>
                                    <th class="text-center">Longitud</th>
                                    <th class="text-center">Lugar</th>
                                    <th class="text-center">Fecha de entrega</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="data-tbody">
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            `;

            $(".loading").remove();
            $(".tabla-deliveries").append($table);

            response.forEach(function (data) {
                var tbody = "";
                // Si son null se le indica no disponible
                if (data.update_at == null) {
                    data.update_at = "No disponible";
                }
                if (data.created_at == null) {
                    data.created_at = "No disponible";
                }
                if (data.name_address == null || data.name_address == "") {
                    data.name_address = "No disponible";
                }
                if (data.estimated_time == null || data.estimated_time == "") {
                    data.estimated_time = "No disponible";
                }
                if (data.tracking_number == null || data.tracking_number == "") {
                    data.tracking_number = "No disponible";
                }

                tbody = `
                <tr class="text-center">
                    <td>${data.id}</td>
                    <td>${data.route_id}</td>
                    <td>${data.name}</td>
                    <td>${data.address}</td>
                    <td>${data.tracking_number}</td>
                    <td>${data.latitude}</td>
                    <td>${data.longitude}</td>
                    <td>${data.name_address}</td>
                    <td>${data.estimated_time}</td>
                    <td>`;
                    
                    if (data.address == "No disponible") {
                        tbody += `<a href="https://www.google.com/maps/search/?api=1&query=${data.latitude},${data.longitude}" target="_blank">
                                    <i class="fas fa-map-pin" style="color: rgb(90,92,105)"></i>
                                </a>`;
                    } else {
                        tbody += `<a href="https://www.google.com/maps/search/?api=1&query=${data.name_address}&query=${data.latitude},${data.longitude}" target="_blank">
                                    <i class="fas fa-map-pin" style="color: rgb(90,92,105)"></i>
                                </a>`;
                    }

                tbody += `
                        <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdl" onclick="editDelivery(${JSON.stringify(data, ['id', 'route_id', 'name', 'address', 'latitude', 'longitude', 'estimated_time', 'name_address', 'tracking_number']).replace(/['"]+/g, '&quot;')})">
                            <i class="fas fa-edit" style="color: rgb(90,92,105)"></i>
                        </a>
                        <a href="" class="delete-form-data" data-toggle="modal" data-target="#deleteMdl" onclick="deleteDelivery(${JSON.stringify(data, ['id']).replace(/['"]+/g, '&quot;')})">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                `;

                $(".data-tbody").append(tbody);
            })

            if($.fn.DataTable) {
                $('.dts').DataTable({
                    language: {
                        url: '/libs/datatables/spanish.json'
                    },
                    columns: [
                        {"type" : "num"},
                        {"type" : "num"},
                        null,
                        null,
                        { orderable: false},
                        { orderable: false},
                        { orderable: false},
                        { orderable: false},
                        {"type" : "date"},
                        { orderable: false}
                    ]

                });
            }
            
            // Llamada al método addRoutesForm() para añadir las rutas existentes a un campo del formulario
            addRoutesForm();

        },
        error: function (response) {
            console.log("No funciona");
        }

    })

    function addRoutesForm() {
        // Se realiza una petición AJAX para cargar todos los usuarios en un campo del formulario
        var params = [];
        $.ajax({
            data: params,
            url: '/admin-panel/getRoutes',
            type: 'get',

            success: function (response) {
                // Se añade a los formularios de añadir y editar los usuarios que hay disponibles
                response.forEach(function (data) {
                    var option = "";

                    option = `<option value="${data.id}">${data.id}</option>`;

                    $("#route-id-create").append(option);
                    $("#route-id-edit").append(option);
                })

                // Inicializar bootstrap-select
                $('#route-id-create').selectpicker();
                $('#route-id-edit').selectpicker();
            },

            error: function (response) {
                console.log('Error al solicitar los usuarios para el formulario.');
            }
        })
    }

    addMap();
}
    
// Funcion multipleModal() para poder tener dos o mas modales abiertos a la vez
(function multipleModal() {
    $(document).on('show.bs.modal', '.modal', function () {
        var zIndex = 1040 + (10 * $('.modal:visible').length);
        $(this).css('z-index', zIndex);
        setTimeout(function () {
            $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
        }, 0);
    });

    $(document).on('hidden.bs.modal', '.modal', function () {
        $('.modal:visible').length && $(document.body).addClass('modal-open');
    });
})()
/* 
var map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 36.8478632, lng: -2.4527225},
        zoom: 13,
    });
*/
    
    

// JQuery para añadir un evento al botón
/*function addMaps() {
    var map = L.map('map').setView([36.8478632,-2.4527225,18], 13);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoiZGVsdHJhY2UiLCJhIjoiY2t5bGs5Z2c4MDAwMjJ3cDh3enNyaTY3OSJ9.dArpzYKdEfpv96yiQksMgw'
    }).addTo(map);
}

addMaps();*/