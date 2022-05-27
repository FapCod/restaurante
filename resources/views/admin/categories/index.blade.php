@extends('adminlte::page')

@section('title', 'Mi Alexia')

@section('content_header')
    <div class="p-2">
        <div class=" mx-auto content card text-center mp-10  text-dark" style="background-color: #F7D24E">
            <h1 class="m-4 font-weight-bold">Lista de categorias<span class="badge badge-secondary ">Gestion</span></h1>
        </div>
    </div>
@stop

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
            }).then(result => {
                    window.location.reload();
                });
            
        </script>
        @stop
    @endif
    <div class="p-2">
        <div class="card text-dark" style="background-color: #F7D24E">
            <div class="card-header">
                <a class="btn btn-dark" href="{{ route('admin.categories.create') }}">Agregar categoria</a>
            </div>

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td width="10px">
                                    <a href="{{ route('admin.categories.edit', $category) }}"
                                        class="btn btn-primary">Editar</a>
                                </td>
                                <td width="10px">
                                    {{-- <form action="{{ route('admin.categories.destroy', $category) }}"
                                         , method="POST", id="formulario">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form> --}}
                                    {{-- {!! Form::open(['route' => ['admin.categories.destroy',$category], 'method' => 'delete','onsubmit' => 'return confirm("Esta seguro de borrar el categoria?")']) !!} 
                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}  
                                    {!! Form::close() !!} --}}
                                    <input type="hidden" class="serdelete_val_id" value="{{ $category->id }}">
                                    <button type="submit" class="btn btn-danger eliminar">Eliminar</button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="py-4 px-4">
                {{ $categories->links() }}
            </div>
        </div>
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
                    var category = $(this).closest('tr').find('.serdelete_val_id').val();
                    
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
                            url: '{{ url("admin/categories") }}/'+category,
                            data: {
                                '_token': $('input[name=_token]').val(),
                                'id':category,

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
