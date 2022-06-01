@extends('adminlte::page')

@section('title', 'Mi Alexia')

@section('content_header')
<div class=" mx-auto content card text-center mp-10  text-dark" style="background-color: #F7D24E">
    <h1 class="m-4 font-weight-bold">Editar producto <span class="badge badge-secondary ">Gestion</span></h1>
</div>
@stop
@section('plugins.Livewire', true)
@section('plugins.Sweetalert2', true)
@section('content')
    @if (session('status'))
    {{-- <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div> --}}
    @section('js')
    <script>
        console.log("{{ session('status') }}");
        Swal.fire({
            position: 'top-end',
            type: 'success',
            title:  "{{ session('status') }}",
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            //actualizar pagina
            window.location.reload();                          
        });
    </script>
    @stop
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

