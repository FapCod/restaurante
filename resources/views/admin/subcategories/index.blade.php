@extends('adminlte::page')

@section('title', 'Mi Alexia')

@section('content_header')
<div class="p-2">    
    <div class=" mx-auto content card text-center mp-10  text-dark" style="background-color: #F7D24E">
        <h1 class="m-4 font-weight-bold">Lista de Subcategorias <span class="badge badge-secondary ">Gestion</span></h1>
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
                <a class="btn btn-dark" href="{{ route('admin.subcategories.create') }}">Agregar Subcategoria</a>
            </div>
            <div class="card-body">
                <table  class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th colspan="2">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategories as $subcategory)
                        <tr>
                            <td>{{ $subcategory->id }}</td>
                            <td>{{ $subcategory->name }}</td>
                            <td width="100">
                                <a href="{{ route('admin.subcategories.edit', $subcategory) }}" class="btn btn-primary">Editar</a>
                            </td>
                            <td width="100">
                                {{-- <form action="{{ route('admin.subcategories.destroy', $subcategory) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form> --}}
                                {!! Form::open(['route' => ['admin.subcategories.destroy',$subcategory], 'method' => 'delete','onsubmit' => 'return confirm("Esta seguro de borrar la Subcategoria?")']) !!} 
                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}  
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
            <div class="py-4 px-4">
                {{ $subcategories->links() }}
            </div>
        </div>
    </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop