@extends('adminlte::page')

@section('title', 'Mi Alexia')

@section('content_header')
<div class=" mx-auto content card text-center mp-10  text-dark" style="background-color: #F7D24E">
    <h1 class="m-4 font-weight-bold">Lista de usuarios <span class="badge badge-secondary ">Gestion</span></h1>
</div>

@stop

@section('content')

    @if (session('status'))
    {{-- <div class="alert alert-success " role="alert">
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
        }).then(result => {
                    window.location.reload();
                });
    </script>
    @stop
    @endif
    <div class="py-2">
        @livewire('admin.users-index')
    </div>
   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
     $(document).ready(function() {
                $('.eliminar').click(function(e) {
                    e.preventDefault();
                    var user = $(this).closest('tr').find('.serdelete_val_id').val();
                    
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
                            $.ajax({
                            type: 'DELETE',
                            url: '{{ url("admin/users") }}/'+user,
                            data: {
                                '_token': $('input[name=_token]').val(),
                                'id':user,

                            },
                            success: function(response) {
                                console.log(response);
                                    Swal.fire(
                                        'Eliminado!',
                                        'Tu registro ha sido eliminado.',
                                        'success'
                                    ).then(result => {
                                        window.location.reload();
                                    });
                            }
                        })
                           
                        } else {
                            Swal.fire(
                                'Cancelado',
                                'El elemento no fue eliminado',
                                'success'
                            )
                            return false;
                        }
                        console.log(result);

                    })
                });
            });
    
    </script>
@stop