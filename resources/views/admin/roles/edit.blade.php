@extends('adminlte::page')

@section('title', 'Mi Alexia')

@section('content_header')
<div class=" mx-auto content card text-center mp-10  text-dark" style="background-color: #F7D24E">
    <h1 class="m-4 font-weight-bold">Editar rol <span class="badge badge-secondary ">Gestion</span></h1>
</div>
@stop

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="p-2">
        <div class="card text-dark" style="background-color: #F7D24E" >
            <div class="card-body">
                {!! Form::model($role,['route' => ['admin.roles.update',$role],'method'=>'PUT']) !!}
                    @include('admin.roles.partials.form')
                    <div class="form-group">
                        {!! Form::submit('Editar', ['class' => 'btn btn-dark']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@stop