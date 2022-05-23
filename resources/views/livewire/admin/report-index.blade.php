<div class="container text-dark p-2" >
    {{-- seleccionar fechar de ingreso de productos --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="background-color: #F7D24E">
                <div class="card-header">
                    {{-- {{ url('reportes/pdf/clientes' . '/' . $fechainicio . '/' . $fechafin) . '/' . $estado }} --}}
                    <a class="btn btn-dark mb-4" 
                    target="_blank" href="{{ url('admin/reportes/pdf/products' . '/' . $start_date . '/' . $end_date ). '/' . $status }}">Generar PDF</a>
                    <a class="btn btn-info mb-4" 
                    wire:click="$emit('cleanupEvent')">Eliminar filtros</a>
                    {{-- input tipo select --}}
                    <select class="form-control mb-4" name="status" id="status" wire:model="status">
                        <option value="" selected disabled>Eliga el estado del producto</option>
                        <option value="1">No publicados</option>
                        <option value="2">Publicados</option>
                    </select>
                    {{-- fin de tipo select --}}
                    <div class="form-group">
                        <label for="">Fecha de inicio</label>
                        <input type="date" class="form-control" 
                        
                        wire:model.prevent="start_date">

                    </div>
                    <div class="form-group">
                        <label for="">Fecha de fin</label>
                        <input type="date" class="form-control" wire:model="end_date">
                    </div>
                </div>
                @if (isset($products))
                    <div class="card-body">
                           <div > {{-- //class="table-responsive" --}}
                                <table id="table_id"  class="table table-striped table-bordered display table-hover stripe" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Estado</th>
                                            <th>Stock</th>
                                            <th>Fecha Creacion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->name }}</td>
                                                @if ($product->status == 1)
                                                    <td><span >No Publicado</span>
                                                    </td>
                                                @else
                                                    <td><span>Publicado</span>
                                                    </td>
                                                @endif
                                                @if ($product->stock == null)
                                                    <td><span>Tiene presentaciones</span>
                                                    </td>
                                                @else
                                                    <td><span>{{ $product->stock }}</span>
                                                    </td>
                                                @endif
                                                <td>{{ $product->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                @else
                    <div class="card-body bg-info">
                        <p>No hay productos registrados...</p>
                    </div>
                    
                @endif
               
            </div>
        </div>
    </div>
    {{-- fin de seleccionar fechar de ingreso de productos --}}

    
</div>
