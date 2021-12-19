@extends('layouts.admin')

@section('titulo')
    <span>Rutas</span>

    <a href="" class="btn btn-dark btn-circle float-right" data-toggle="modal" data-target="#createMdl">
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
@endpush

@push('scripts')
    <script src="{{asset('/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/admin-panel/routes_crud.js')}}"></script>

    <script>
        function editRoute(route){
            $("#editRouteFrm").attr('action',`/admin-panel/routes/${route.id}`);
            $("#editRouteFrm #name-edit").val(route.name);
            $("#editRouteFrm #last-name-edit").val(route.last_name);
            $("#editRouteFrm #email-edit").val(route.email);
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