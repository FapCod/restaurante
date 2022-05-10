@extends('adminlte::page')

@section('title', 'Mi Alexia')

@section('content_header')
    <h1>Edit product</h1>
@stop

@section('content')
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="col-3">
                <a href="{{ route('admin.products.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i>
                    Ir a lista de productos
                </a>
            </div>
        </div>


        <div class="card-body">
            {!! Form::model($product,['route' => ['admin.products.update',$product], 'files' => true,'method' => 'PUT']) !!}
            {!! Form::hidden('user_id', auth()->user()->id) !!}
            @include('admin.products.partials.form')
            <div class="form-group">
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

    </style>
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

        //cambiar de imagen
        document.getElementById("file").addEventListener("change", cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
        }
    </script>
@stop

