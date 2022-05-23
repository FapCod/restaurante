<div class="card text-dark" style="background-color: #F7D24E">
    <div class="card-header">
        <a class="btn btn-dark mb-4" href="{{ route('admin.users.create') }}">Agregar user</a>
        <input wire:model="search" type="text" class="form-control" placeholder="Buscar user">
    </div>
    @if ($users->count() > 0)
        <div class="card-body">
            <table  class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>EMAIL</th>
                        <th>ROL</th>
                        <th colspan="2">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->roles()->count() > 0)
                                @foreach ($user->roles as $role)
                                    <button type="button" class="btn btn-outline-primary  btn-sm">{{ $role->name }}</button>
                                @endforeach
                            @endif
                        </td>
                        <td width="100">
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary">Editar</a>
                        </td>
                        <td width="100">
                            {!! Form::open(['route' => ['admin.users.destroy',$user], 'method' => 'delete','onsubmit' => 'return confirm("Esta seguro de borrar el user?")']) !!} 
                            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}  
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
            </table>
        </div>

        <div class="card-footer">
            {{ $users->links() }}
        </div>
    @else
        <div class="card-body bg-info">
            <p>No hay users registrados...</p>
        </div>
    @endif
</div>
