@extends('adminlte::page')

@section('title', 'Mi Alexia')

@section('content_header')
<h1 class="font-weight-normal text-center">Editar product</h1>
@stop
@section('plugins.Livewire', true)
@section('plugins.Sweetalert2', true)
@section('content')
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    @livewire('admin.edit-product', ['product' => $product])
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
        document.getElementById("product.file").addEventListener("change", cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
        }
    </script>

    {{-- preguntar si eliminar--}}

    {{-- estas seguro de eliminar livewire --}}
    <script>
        Livewire.on('delepresentation',presentation=>{
            Swal.fire({
                title: 'Estas seguro?',
                text: "Esto no se podra revertir! ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminarlo!'
                }).then((result) => {
                    if (result.value==true) {
                        Livewire.emit('delete',presentation);
                        Swal.fire(
                        'Eliminado!',
                        'El elemento fue eliminado.',
                        'success'
                        )
                    }else {
                        Swal.fire(
                        'Cancelado',
                        'El elemento no fue eliminado',
                        'success'
                        )
                            }
                    console.log(result);
                    console.log(presentation);
                    
            })
        });
    
        

    </script>
   
@stop

