@extends('layouts.admin')

@section('titulo')
    <span>Usuarios</span>

    <a href="" class="btn btn-dark btn-circle float-right" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>
@endsection

@section('contenido')
    
    @include('layouts.users.modals.create')
    @include('layouts.users.modals.update')
    @include('layouts.users.modals.delete')

    <i class="fas svg-inline--fa fa-spinner fa-w-16 fa-spin fa-lg loading"></i>
    <div class="tabla-users">

    </div>  
    
@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
@endpush

@push('scripts')
    <script src="{{asset('/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

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