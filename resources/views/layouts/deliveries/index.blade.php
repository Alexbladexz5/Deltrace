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

    @if(isset($idRoute))
        @if(!empty($idRoute))
            <p style="display: none" id="idRoute">{{$idRoute}}</p>
        @else
            <p style="display: none" id="idRoute"></p>
        @endif
    @else
        <p style="display: none" id="idRoute">a</p>
    @endif 

    <i class="fas svg-inline--fa fa-spinner fa-w-16 fa-spin fa-lg loading"></i>
    <div class="tabla-deliveries">

    </div>  
    
@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/admin-panel/main.css')}}">
@endpush

@push('scripts')
    <script src="{{asset('/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/admin-panel/deliveries_crud.js')}}"></script>

    <script>
        function editDelivery(delivery){
            $("#editDeliveryFrm").attr('action',`/admin-panel/deliveries/${delivery.id}`);
            $("#editDeliveryFrm #name-edit").val(delivery.name);
            $("#editDeliveryFrm #last-name-edit").val(delivery.last_name);
            $("#editDeliveryFrm #email-edit").val(delivery.email);
        }

        function deleteDelivery(delivery){
            $("#deleteDeliveryFrm").attr('action',`/admin-panel/deliveries/${delivery.id}`);
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