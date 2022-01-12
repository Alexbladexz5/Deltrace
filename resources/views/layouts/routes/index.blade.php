@extends('layouts.admin')

@section('titulo')
    <span>Rutas</span>

    <a href="" class="btn btn-dark btn-circle float-right" data-toggle="modal" data-target="#createMdl" onclick="createRoute({{auth()->user()->id}})">
        <i class="fas fa-plus"></i>
    </a>
@endsection

@section('contenido')
    
    @include('layouts.routes.modals.create')
    @include('layouts.routes.modals.update')
    @include('layouts.routes.modals.delete')

    <i class="fas svg-inline--fa fa-spinner fa-w-16 fa-spin fa-lg loading"></i>
    <div class="tabla-routes">

    </div>  
    
@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/admin-panel/main.css')}}">
    <link rel="stylesheet" href="{{asset('libs/bootstrap-select/bootstrap-select.min.css')}}">
@endpush

@push('scripts')
    <script src="{{asset('/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/admin-panel/routes_crud.js')}}"></script>
    <script src="{{asset('libs/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('libs/bootstrap-select/defaults-es_ES.min.js')}}"></script>

    <script>
        function createRoute(route) {
            $('#user-id-create').val(route);
            $('#user-id-create').selectpicker('render');
        }

        function editRoute(route){
            $("#editRouteFrm").attr('action',`/admin-panel/routes/${route.id}`);
            $('#user-id-edit').val(`${route.user_id}`);
            $('#user-id-edit').selectpicker('render');
            $("#editRouteFrm #date-time-edit").val((route.date_time).replace(/ /g, "T"));
        }

        function deleteRoute(route){
            $("#deleteRouteFrm").attr('action',`/admin-panel/routes/${route.id}`);
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