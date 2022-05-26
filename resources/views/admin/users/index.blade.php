@extends('adminlte::page')

@section('title', 'Mi Alexia')

@section('content_header')
<div class=" mx-auto content card text-center mp-10  text-dark" style="background-color: #F7D24E">
    <h1 class="m-4 font-weight-bold">Lista de usuarios <span class="badge badge-secondary ">Gestion</span></h1>
</div>

@stop

@section('content')

    @if (session('status'))
    <div class="alert alert-success " role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="py-2">
        @livewire('admin.users-index')
    </div>
   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop