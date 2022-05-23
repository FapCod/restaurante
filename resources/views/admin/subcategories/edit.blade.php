@extends('adminlte::page')

@section('title', 'Mi Alexia')

@section('content_header')
<div class=" mx-auto content card text-center mp-10  text-dark" style="background-color: #F7D24E">
    <h1 class="m-4 font-weight-bold">Editar subcategoria <span class="badge badge-secondary ">Gestion</span></h1>
</div>
@stop

@section('content')
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="card text-dark" style="background-color: #F7D24E">
        <div class="card-body">
            {!! Form::model($subcategory,['route' => ['admin.subcategories.update',$subcategory], 'method'=>'PUT']) !!}
                <div class="form-group">
                    {!! Form::label('category_id', 'Selecciona la categoria:') !!}  
                    {{-- {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!} --}}
                    <select id="category_id" name="category_id" class="form-control">
                        <option selectd value="{{ $subcategory->category->id }}">{{ $subcategory->category->name }}</option>
                        @foreach($categories as $category)
                            <option id="category_id" name="category_id" value="{{ $category->id }}" >{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
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
                 {{-- tiene presentacion --}}
                 <div class="form-group">
                    {!! Form::label('presentation', 'Tiene presentacion?') !!}
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="presentation" id="presentation" value="1" checked>
                        <label class="form-check-label" for="presentation">
                            No
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="presentation" id="presentation" value="2">
                        <label class="form-check-label" for="presentation">
                            Si
                        </label>
                </div>
                {{-- fin tiene presentacion --}}
                <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control ', 'id' => 'slug','readonly']) !!}

                    @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::submit('Actualizar', ['class' => 'btn btn-dark']) !!}
                </div>
            {!! Form::close() !!}
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