// Mostrar lista con todas las rutas
$(document).ready(load);

function load() {
    var params = [];
    $.ajax({
        data: params,
        url: '/admin-panel/getRoutes',
        type: 'get',

        success: function (response) {
            $table = `
                <div class="card">
                    <div class="card-body">
                        <table id="dt-routes" class="table table-striped table-bordered table-responsive-md dts">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Usuario</th>
                                    <th class="text-center">Fecha/Hora</th>
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
            $(".tabla-routes").append($table);

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
                    <td class="dt-control"><i class="fas fa-plus" style="color: rgb(90,92,105)"></i></td>
                    <td>${data.id}</td>
                    <td>${data.name}</td>
                    <td>${data.date_time}</td>
                    <td>
                        <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdl" onclick="editRoute(${JSON.stringify(data).replace(/['"]+/g, '&quot;')})">
                            <i class="fas fa-edit" style="color: rgb(90,92,105)"></i>
                        </a>
                        <a href="" class="delete-form-data" data-toggle="modal" data-target="#deleteMdl" onclick="deleteRoute(${JSON.stringify(data).replace(/['"]+/g, '&quot;')})">
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
                        { orderable: false},
                        null,
                        null,
                        null,
                        { orderable: false}
                    ],
                    "order": [[ 1, "asc" ]]
                });
            }

            // Llamada a la función childRows() para añadir un evento a los botones
            childRows();
        },
        error: function (response) {
            console.log("No funciona");
        }
    })
    
    function childRows() {
        // Se añade el evento click al icono para añadir una consulta personalizada a una fila de la tabla
        $('#dt-routes tbody').on('click', 'td.dt-control', function () {
            var table = $('.dts').DataTable();
            var tr = $(this).closest('tr');
            var row = table.row( tr );

            if ( row.child.isShown() ) {
                // Si la fila está abierta se cierra
                $('div.slider', row.child()).slideUp( function () {
                    row.child.hide();
                    tr.removeClass('shown');
                } );
            }
            else {
                // Se realiza una petición AJAX. Si funciona correctamente mostrará una tabla con las entregas de esa ruta. En el caso contrario no se mostrara nada. La variable id es de la ruta que se quiere consultar
                var params = [];
                $.ajax({
                    data: params,
                    url: '/admin-panel/getDeliveries/' + row.data()[1],
                    type: 'get',

                    success: function (response) {
                        if (response.length >= 1) {
                            row.child(createTableDeliveries(response, row.data()[1])).show();  // Se manda los datos y el id de la ruta
                            tr.addClass('shown');
                        } else {
                            row.child(createTableVoid()).show();  // Se manda los datos y el id de la ruta
                            tr.addClass('shown');
                        }
                        

                        if($.fn.DataTable) {
                            $tabla = `.dts-deliveries-${row.data()[1]}`;
                            $($tabla).DataTable({
                                language: {
                                    url: '/libs/datatables/spanish.json'
                                },
                                paging: false,
                                searching: false,
                                columns: [
                                    null,
                                    null,
                                    null,
                                    null,
                                    null,
                                    { orderable: false}
                                ],
                                "order": [[ 1, "asc" ]]
                            });
                        }

                        // Mostrar con animación el resultado
                        $('div.slider', row.child()).slideDown();
                    },

                    error: function (response) {
                        console.log('Error en AJAX');
                    }
                })
            }
        });

        function createTableDeliveries(response, id) {
            // En la variable response se incluye el json de la consulta
            var tbody = '';
            $table = `
            <div class="slider">
            <table class="table dts-deliveries-${id}">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Dirección</th>
                        <th class="text-center">Coordenadas</th>
                        <th class="text-center">Tiempo estimado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
            `;

            response.forEach(function (data) {
                tbody += `
                <tr class="text-center">
                    <td>${data.id}</td>
                    <td>${data.name}</td>
                    <td>${data.address}</td>
                    <td><a href="https://google.es/maps/@${data.coordinates}z" target="_blank">${data.coordinates}</a></td>
                    <td>${data.estimated_time}</td>
                    <td>
                        Ver más
                        <a href="admin-panel/getDeliveries/${data.route_id}">
                            <i class="fas fa-edit" style="color: rgb(90,92,105)"></i>
                        </a>
                    </td>
                </tr>
                `;
            })

            $table += tbody + `</tbody></table></div>`;
            return $table;
        }

        function createTableVoid() {
            // Se indica que no hay entregas
            return '<div class="slider">' +
            '<table class="table">'+
            '<tr>'+
                '<td>No hay ninguna entrega</td>'+
            '</tr></table></div>';
        }
    }
}