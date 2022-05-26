@extends('adminlte::page')

@section('title', 'Mi Alexia')

@section('content_header')
    <div class="p-2">
        <div class=" mx-auto content card text-center mp-10  text-dark" style="background-color: #F7D24E">
            <h1 class="m-4 font-weight-bold">Lista de categorias<span class="badge badge-secondary ">Gestion</span></h1>
        </div>
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
            <div class="card-header">
                <a class="btn btn-dark" href="{{ route('admin.categories.create') }}">Agregar categoria</a>
            </div>

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td width="10px">
                                    <a href="{{ route('admin.categories.edit', $category) }}"
                                        class="btn btn-primary">Editar</a>
                                </td>
                                <td width="10px">
                                    {{-- <form action="{{ route('admin.categories.destroy', $category) }}"
                                         , method="POST", id="formulario">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form> --}}
                                    {!! Form::open(['route' => ['admin.categories.destroy',$category], 'method' => 'delete','onsubmit' => 'return confirm("Esta seguro de borrar el categoria?")']) !!} 
                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}  
                                    {!! Form::close() !!}
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="py-4 px-4">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('hola');

        function eliminar(event) {
            alert('oe oe oe ');
        }
    </script>
    
@stop
