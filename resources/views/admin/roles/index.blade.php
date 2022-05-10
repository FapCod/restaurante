@extends('adminlte::page')

@section('title', 'Mi Alexia')

@section('content_header')
    <h1>lista roles</h1>
@stop

@section('content')
    @if (session('status'))
    <div class="alert alert-success" rol="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a class="btn btn-success" href="{{ route('admin.roles.create') }}">Agregar roles</a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead >
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td width="100">
                                <a href="{{route('admin.roles.edit', $role)}}" class="btn btn-primary">Editar</a>
                            </td>
                            <td width="100">
                                {!! Form::open(['route' => ['admin.roles.destroy',$role], 'method' => 'delete','onsubmit' => 'return confirm("Esta seguro de borrar el Rol?")']) !!} 
                                {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}  
                                {!! Form::close() !!}
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop