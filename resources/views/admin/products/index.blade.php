@extends('adminlte::page')

@section('title', 'Mi Alexia')

@section('content_header')
    <h1>Inventario del restaurante</h1>
@stop

@section('content')
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    @livewire('admin.product-index')
   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop