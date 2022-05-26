@extends('adminlte::page')

@section('title', 'Mi Alexia')

@section('content_header')
    <div class="p-2">
        <div class=" mx-auto content card text-center mp-10  text-dark" style="background-color: #F7D24E">
            <h1 class="m-4 font-weight-bold">Lista de marcas <span class="badge badge-secondary ">Gestion</span></h1>
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
            <a class="btn btn-dark" href="{{ route('admin.brands.create') }}">Agregar Marca</a>
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
                    @foreach($brands as $brand)
                        <tr>
                            <td>{{$brand->id}}</td>
                            <td>{{$brand->name}}</td>
                            <td width="10px">
                                <a href="{{route('admin.brands.edit', $brand)}}" class="btn btn-primary">Editar</a>
                            </td>
                            <td width="10px">
                                {{-- <form action="{{route('admin.brands.destroy', $brand)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form> --}}
                                {!! Form::open(['route' => ['admin.brands.destroy',$brand], 'method' => 'delete','onsubmit' => 'return confirm("Esta seguro de borrar la Marca?")']) !!} 
                                {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}  
                                {!! Form::close() !!}
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="py-4 px-4">
            {{ $brands->links() }}
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