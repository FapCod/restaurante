@extends('adminlte::page')

@section('title', 'Mi Alexia')

@section('content_header')
    <div class="p-2">
        <div class=" mx-auto content card text-center mp-10  text-dark" style="background-color: #F7D24E">
            <h1 class="m-4 font-weight-bold">Lista de productos<span class="badge badge-secondary ">Gestion</span></h1>
        </div>
    </div>
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
    {{-- <script>
        function checkForm(){
            Swal.fire({
                title: 'Estas seguro?',
                text: "Esto no se podra revertir! ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminarlo!'
            }).then((result) => {
                if (result.value == true) {
                    Swal.fire(
                        'Eliminado!',
                        'El elemento fue eliminado.',
                        'success'
                    )
                    return true;
                } else {
                    Swal.fire(
                        'Cancelado',
                        'El elemento no fue eliminado',
                        'success'
                    )
                    return false;
                }
                console.log(result);
                console.log(presentation);

            })
        };
    </script> --}}
@stop
