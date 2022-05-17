<div>
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
        
        <div>
            <x-jet-label>Presentacion</x-jet-label>
            <x-jet-input wire:model="presentation" type="text" class="form-control" />
            @error('presentation')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-jet-label>Stock</x-jet-label>
            <x-jet-input wire:model="stock" type="number" class="form-control" />
            @error('stock')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            {{-- boton agregar --}}
            <x-jet-button wire:click="save" wire:loading.class="disabled" wire:target="save" class="mt-2 btn-primary rounded-lg">
                Agregar
            </x-jet-button>
        </div>
    </div>

    <ul>
        @foreach ($presentations as $presentation)
            <li>
                {{-- {{ $presentation->name }} --}}
                <span class="badge badge-primary">{{ $presentation->stock }}</span>
            </li>
        @endforeach
    </ul>
</div>
