@extends('adminlte::page')

@section('title', 'Mi Alexia')

@section('content_header')
<div class=" mx-auto content card text-center mp-10  text-dark" style="background-color: #F7D24E">
    <h1 class="m-4 font-weight-bold">Lista de roles <span class="badge badge-secondary ">Gestion</span></h1>
</div>
@stop

@section('content')
    @if (session('status'))
    {{-- <div class="alert alert-success" rol="alert">
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
    <div class="card text-dark" style="background-color: #F7D24E">
        <div class="card-header">
            <a class="btn btn-dark" href="{{ route('admin.roles.create') }}">Agregar roles</a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead >
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td width="100">
                                <a href="{{route('admin.roles.edit', $role)}}" class="btn btn-primary">Editar</a>
                            </td>
                            <td width="100">
                                {{-- {!! Form::open(['route' => ['admin.roles.destroy',$role], 'method' => 'delete','onsubmit' => 'return confirm("Esta seguro de borrar el Rol?")']) !!} 
                                {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}  
                                {!! Form::close() !!} --}}
                                <input type="hidden" class="serdelete_val_id" value="{{ $role->id }}">
                                <button type="submit" class="btn btn-danger eliminar">Eliminar</button>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="py-4 px-4">
            {{ $roles->links() }}
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
                    var role = $(this).closest('tr').find('.serdelete_val_id').val();
                    
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
                            url: '{{ url("admin/roles") }}/'+role,
                            data: {
                                '_token': $('input[name=_token]').val(),
                                'id':role,

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