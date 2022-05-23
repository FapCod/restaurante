@extends('adminlte::page')

@section('title', 'Mi Alexia')

@section('content_header')
<div class=" mx-auto content card text-center mp-10  text-dark" style="background-color: #F7D24E">
    <h1 class="m-4 font-weight-bold">Inventario del restaurante <span class="badge badge-secondary ">Gestion</span></h1>
</div>
@stop

@section('content')
    <div class=" shadow jumbotron bg-dark " style="background-image: url(https://api.lorem.space/image/drink?w=1000&h=1000);">
        <div class="shadow bg-white-100 ">
            <h1 class="display-4  ">Bienvenido al inventario del Restauraten Mi Alexia </h1>
            <p class="lead">Aqui podras gestionar los productos y usuarios de la empresa.</p>
        </div>
        <hr class="my-4">
    </div>
   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop