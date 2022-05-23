@extends('adminlte::page')

@section('title', 'Mi Alexia')

@section('content_header')
<div class=" mx-auto content card text-center mp-10  text-dark" style="background-color: #F7D24E">
    <h1 class="m-4 font-weight-bold">Crear usuario <span class="badge badge-secondary ">Gestion</span></h1>
</div>
@stop

@section('content')
    <div class="card text-dark" style="background-color: #F7D24E">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.users.store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Ingresa el nombre']) !!}

                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Ingresa el email']) !!}

                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Contraseña') !!}
                {!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'Ingresa la contraseña']) !!}
                @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
            <div class="form-group">
                {!! Form::label('password_confirmation', 'Confirmar contraseña') !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation', 'placeholder' => 'Confirma la contraseña']) !!}
                @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('roles', 'Roles') !!}
                {!! Form::select('roles[]', $roles, null, ['class' => 'form-control', 'id' => 'roles']) !!}
            </div>




            <div class="form-group">
                {!! Form::submit('Guardar', ['class' => 'btn btn-dark']) !!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
