<div class="card">
    <div class="card-header">
        <a class="btn btn-success mb-4" href="{{ route('admin.products.create') }}">Agregar Producto</a>
        <input wire:model="search" type="text" class="form-control" placeholder="Buscar producto">
    </div>
    @if ($products->count() > 0)
        <div class="card-body">
            <table  class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th colspan="2">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td width="100">
                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-primary">Editar</a>
                        </td>
                        <td width="100">
                            {!! Form::open(['route' => ['admin.products.destroy',$product], 'method' => 'delete','onsubmit' => 'return confirm("Esta seguro de borrar el producto?")']) !!} 
                            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}  
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
            </table>
        </div>

        <div class="card-footer">
            {{ $products->links() }}
        </div>
    @else
        <div class="card-body bg-info">
            <p>No hay productos registrados...</p>
        </div>
    @endif
</div>
