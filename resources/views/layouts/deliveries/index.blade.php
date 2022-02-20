@extends('layouts.admin')

@section('titulo')
    <span>Entregas</span>

    <a href="" class="btn btn-dark btn-circle float-right" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>
@endsection

@section('contenido')
    
    @include('layouts.deliveries.modals.create')
    @include('layouts.deliveries.modals.update')
    @include('layouts.deliveries.modals.delete')
    @include('layouts.deliveries.modals.map')

    @if(isset($idRoute))
        @if(!empty($idRoute))
            <p style="display: none" id="idRoute">{{$idRoute}}</p>
        @else
            <p style="display: none" id="idRoute"></p>
        @endif
    @else
        <p style="display: none" id="idRoute"></p>
    @endif 

    <i class="fas svg-inline--fa fa-spinner fa-w-16 fa-spin fa-lg loading"></i>
    <div class="tabla-deliveries">

    </div>  
    
@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/libs/leaflet/leaflet.css')}}">
    <link rel="stylesheet" href="{{asset('libs/bootstrap-select/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/admin-panel/main.css')}}">
@endpush

@push('scripts')
    <script src="{{asset('/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/libs/leaflet/leaflet.js')}}"></script>
    <script src="{{asset('libs/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('libs/bootstrap-select/defaults-es_ES.min.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0AUVJat2__UhZ8msExOQa5xYZpigP8Ew&libraries=places"></script>
    <script src="{{asset('js/admin-panel/deliveries_crud.js')}}"></script>
    <script src="{{asset('js/admin-panel/deliveries_maps.js')}}"></script>

    <script>
        function editDelivery(delivery){
            if (delivery.update_at == "No disponible") {
                delivery.update_at = "";
                }
            if (delivery.created_at == "No disponible") {
                delivery.created_at = "";
            }
            if (delivery.name_address == "No disponible") {
                delivery.name_address = "";
            }
            if (delivery.estimated_time == "No disponible") {
                delivery.estimated_time = "";
            }
            if (delivery.tracking_number == "No disponible") {
                delivery.tracking_number = "";
            }

            $("#editDeliveryFrm").attr('action',`/admin-panel/deliveries/${delivery.id}`);
            $('#editDeliveryFrm #route_id-edit').val(delivery.route_id);
            $('#editDeliveryFrm #route_id-edit').selectpicker('render');
            $("#editDeliveryFrm #name-edit").val(delivery.name);
            $("#editDeliveryFrm #address-edit").val(delivery.address);
            $("#editDeliveryFrm #name-address-edit").val(delivery.name_address);
            $("#editDeliveryFrm #tracking-number-edit").val(delivery.tracking_number);
            $("#editDeliveryFrm #latitude-edit").val(delivery.latitude);
            $("#editDeliveryFrm #longitude-edit").val(delivery.longitude);
            $("#editDeliveryFrm #estimated-time-edit").val(delivery.estimated_time.replace(/ /g, "T"));
        }

        function deleteDelivery(delivery){
            $("#deleteDeliveryFrm").attr('action',`/admin-panel/deliveries/${delivery.id}`);
        }

        // Modificar clase del botón "Guardar" de la ventana modal mapa. Se utilizará para saber donde colocar las coordenadas (create o edit)
        function modalCoordinates(typeModal) {
            $('#save-marker').removeClass('create');
            $('#save-marker').removeClass('edit');

            if(typeModal == 'create'){
                $('#save-marker').addClass('create');
            } else if (typeModal == 'edit'){
                $('#save-marker').addClass('edit');
            }
        }
    </script>

    @if(!$errors->isEmpty())
        @if($errors->has('post'))
            <script>
                $(function() {
                    $('#createMdl').modal('show');
                });
            </script>
        @else
        <script>
            $(function() {
                $('#editMdl').modal('show');
            });
        </script>
        @endif
    @endif

@endpush