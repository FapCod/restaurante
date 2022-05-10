@extends('adminlte::page')

@section('title', 'Mi Alexia')

@section('content_header')
    <h1>Actualizar rol</h1>
@stop

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre:</p>
            <p class="form-control">{{ $user->name }}</p>
            <h2 class="h5">Listado de roles:</h2>
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
            @foreach ($roles as $role)
                <div class="form-check">
                    {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'form-check-input']) !!}
                    {!! Form::label($role->name, $role->name, ['class' => 'form-check-label']) !!}
                </div>
            @endforeach
            <div class="form-group">
                {!! Form::submit('Actualizar rol', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
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
