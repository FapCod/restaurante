@extends('adminlte::page')

@section('title', 'Mi Alexia')

@section('content_header')
<div class=" mx-auto content card text-center mp-10  text-dark" style="background-color: #F7D24E">
    <h1 class="m-4 font-weight-bold">Editar categoria <span class="badge badge-secondary ">Gestion</span></h1>
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
        <div class="card-body">
            {!! Form::model($category,['route' => ['admin.categories.update',$category], 'method'=>'PUT']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name','placeholder' => 'Ingresa el nombre de la categoria']) !!}

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('icon', 'Icono &#40; campo opcional &#41;') !!}
                    {!! Form::text('icon', null, ['class' => 'form-control', 'id' => 'icon','placeholder' => 'Ingresa un icono &#40; campo opcional &#41;']) !!}
                </div>
               {{-- marca --}}
                
               <h2 class="h3">Lista de marcas</h2>
               <div class="form-group row row-cols-6 sm:row-cols-4">
                   @foreach ($brands as $brand)
                       <div class="col-4 md:col-5">
                           <label>
                               {!! Form::checkbox('brands[]',$brand->id, null,['class'=>'mr-1']) !!}
                               {{ $brand->name }}
                           </label>
                       </div>
                       
                   @endforeach
               </div>

           

           {{-- fin marca --}}
                <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control ', 'id' => 'slug','readonly']) !!}

                    @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
   </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@stop