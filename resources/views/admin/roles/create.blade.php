@extends('adminlte::page')

@section('title', 'Mi Alexia')

@section('content_header')
<div class=" mx-auto content card text-center mp-10  text-dark" style="background-color: #F7D24E">
    <h1 class="m-4 font-weight-bold">Crear rol <span class="badge badge-secondary ">Gestion</span></h1>
</div>
@stop

@section('content')
   <div class="p-2">
        <div class="card text-dark" style="background-color: #F7D24E">
            <div class="card-body">
                {!! Form::open(['route' => 'admin.roles.store']) !!}
                    
                    @include('admin.roles.partials.form')

                    <div class="form-group">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-dark']) !!}
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
   
@stop