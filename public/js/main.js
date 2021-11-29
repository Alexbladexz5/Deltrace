// Mostrar lista con todos los usuarios
$(document).ready(load);

function load() {
    var params = [];
    $.ajax({
        data: params,
        url: '/admin-panel/getUsers',
        type: 'get',

        success: function (response) {
            $table = `
                <div class="card">
                    <div class="card-body">
                        <table id="dt-users" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Apellidos</th>
                                    <th class="text-center">Correo</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="data-tbody">
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            `;

            $(".tabla-users").append($table);

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
                    <td>${data.name}</td>
                    <td>${data.last_names}</td>
                    <td>${data.email}</td>
                </tr>
                `;

                $(".data-tbody").append(tbody);
            })

        },
        error: function (response) {
            console.log("No funciona");
        }

    })
}