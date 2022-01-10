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
                                    <th class="text-center">Coordenadas</th>
                                    <th class="text-center">Tiempo estimado</th>
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

                if (data.update_at == null) {
                    data.update_at = "No disponible";
                }
                if (data.created_at == null) {
                    data.created_at = "No disponible";
                }

                tbody = `
                <tr class="text-center">
                    <td>${data.id}</td>
                    <td>${data.route_id}</td>
                    <td>${data.name}</td>
                    <td>${data.address}</td>
                    <td><a href="https://google.es/maps/@${data.coordinates}z" target="_blank">${data.coordinates}</a></td>
                    <td>${data.estimated_time}</td>
                    <td>
                        <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdl" onclick="editDelivery(${JSON.stringify(data).replace(/['"]+/g, '&quot;')})">
                            <i class="fas fa-edit" style="color: rgb(90,92,105)"></i>
                        </a>
                        <a href="" class="delete-form-data" data-toggle="modal" data-target="#deleteMdl" onclick="deleteDelivery(${JSON.stringify(data).replace(/['"]+/g, '&quot;')})">
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
                        null,
                        null,
                        null,
                        {"type" : "num"},
                        {"type" : "date"},,
                        { orderable: false}
                    ]

                });
            }
            
        },
        error: function (response) {
            console.log("No funciona");
        }

    })
}