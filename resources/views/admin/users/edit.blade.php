@extends('adminlte::page')

@section('title', 'Mi Alexia')

@section('content_header')
<div class=" mx-auto content card text-center mp-10  text-dark" style="background-color: #F7D24E">
    <h1 class="m-4 font-weight-bold">Editar usuario <span class="badge badge-secondary ">Gestion</span></h1>
</div>
@stop

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="p-2">
        <div class="card text-dark" style="background-color: #F7D24E">
            <div class="card-body">
                {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'PUT']) !!}
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
                    {!! Form::password('password',['class' => 'form-control', 'id' => 'password', 'placeholder' => 'Ingresa la contraseña','autocomplete' => 'off']) !!}
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Confirmar contraseña') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation', 'placeholder' => 'Confirma la contraseña','autocomplete' => 'off']) !!}
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                @foreach ($roles as $role)
                    <div class="form-check">
                        {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'form-check-input']) !!}
                        {!! Form::label($role->name, $role->name, ['class' => 'form-check-label']) !!}
                    </div>
                @endforeach
                <div class="form-group">
                    {!! Form::submit('Actualizar Usuario', ['class' => 'btn btn-primary']) !!}
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
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@stop
