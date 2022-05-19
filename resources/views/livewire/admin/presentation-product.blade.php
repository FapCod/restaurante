<div>
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
        
        <div>
            <x-jet-label>Presentacion</x-jet-label>
            <x-jet-input wire:model.defer="name" type="text" class="form-control" />
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div hidden>
            <x-jet-label>Slug</x-jet-label>
            <x-jet-input wire:model.defer="slug" type="text" class="form-control" />
            @error('slug')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-jet-label>Stock</x-jet-label>
            <x-jet-input wire:model.defer="stock" type="number" class="form-control" />
            @error('stock')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            {{-- boton agregar --}}
            @if ($open)
                <x-jet-button wire:click="update" wire:loading.class="disabled" wire:target="update" class="mt-2 btn-primary rounded-lg">
                    Actualizar
                </x-jet-button>
                <x-jet-button wire:click="cancel" wire:loading.class="disabled" wire:target="cancel" class="mt-2 btn-danger rounded-lg">
                    Cancelar
                </x-jet-button>
            @else
                <x-jet-button wire:click="save" wire:loading.class="disabled" wire:target="save" class="mt-2 btn-primary rounded-lg">
                    Agregar
                </x-jet-button>
            @endif
            
        </div>
    </div>

    @if ($presentations->count() > 0)
        <div class="shadow-lg p-3 mb-5 bg-white rounded">
            <table class="table-responsive-xl"
                style="width: 100%;">
                <thead>
                    <tr>
                        <th scope="col">Presentacion</th>
                        <th scope="col">Stock</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($presentations as $presentation)
                        <tr>
                            <td>{{ $presentation->name }}</td>
                            <td>{{ $presentation->stock }}</td>
                            <td width="100">
                                <button  class="btn btn-success w-full" 
                                wire:click="edit({{ $presentation->id }})"
                                >
                                    <i class="fas fa-redo"></i>Editar
                                </button>
                            </td>
                            <td width="100">
                                <button class="btn btn-danger"
                                wire:click.prevent="$emit('delepresentation',{{ $presentation->id }})"
                                >
                                    <i class="fas fa-trash-alt"></i>Eliminar
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
    


    
</div>

