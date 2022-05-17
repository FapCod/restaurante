<div class="card">
    
    <div class="card-header">
        <a class="btn btn-success mb-4" href="{{ route('admin.products.create') }}">Agregar Producto</a>
        {{-- input tipo select --}}
        <select class="form-control mb-4" name="status" id="status" wire:model="status">
            <option value="" selected disabled>Eliga el estado del producto</option>
            <option value="1">No publicados</option>
            <option value="2">Publicados</option>
        </select>
        {{-- fin de tipo select --}}
        <input wire:model="search" type="text" class="form-control" placeholder="Buscar producto">
    </div>
    @if ($products->count() > 0)
        <div class="card-body">
            <table  class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>ESTADO</th>
                        <th colspan="2">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        @if ($product->status == 1)
                            <td><button type="button" class="btn btn-outline-danger">No Publicado</button>
                            </td>
                        @else
                            <td><button type="button" class="btn btn-outline-primary">Publicado</button>
                            </td>
                        @endif
                        
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

        @if ($products->hasPages())
            <div class="card-footer">
                {{ $products->links() }}
            </div>
        @endif
    @else
        <div class="card-body bg-info">
            <p>No hay productos registrados...</p>
        </div>
    @endif
</div>
