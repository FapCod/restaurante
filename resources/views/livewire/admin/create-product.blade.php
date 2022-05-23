<div class="text-dark p-2" >
    <div class="card shadow mb-4  rounded" style="background-color: #F7D24E">
        <div class="card-header">
            <div class="col-3 sm:cols-4">
                <a href="{{ route('admin.products.index') }}" class="btn btn-dark">
                    <i class="fas fa-arrow-left"></i>
                    Productos
                </a>
            </div>
        </div>

        <div class="card-body ">
            {{-- hacer una grid de dos columnas --}}

            {{-- Categoria y Subcategoria --}}
            <div class="row">
                <div class="form-group col sm:col-md-auto">
                    <x-jet-label value="Categorias" />
                    <select name="category_id" id="category_id" class="form-control" wire:model="category_id">
                        <option value="" selected disabled>Seleccione una categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error class="text-danger" for="category_id" />
                </div>
                <div class="form-group col sm:col-md-auto">
                    <x-jet-label value="Subcategorias" />
                    <select name="subcategory_id" id="subcategory_id" class="form-control"
                        wire:model="subcategory_id">
                        <option value="" selected disabled>Seleccione una categoria</option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error class="text-danger" for="subcategory_id" />
                </div>
            </div>
            {{-- Fin de Categoria y Subcategoria --}}
            {{-- Nombre --}}
            <div class="form-group mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input class="form-control" wire:model="name" type="text"
                    placeholder="Ingrese el nombre del producto..." />
                <x-jet-input-error class="text-danger" for="name" />
            </div>
            {{-- Slug --}}
            <div class="form-group mb-4">
                <x-jet-label value="Slug/Nombre de url" />
                <x-jet-input class="form-control" wire:model="slug" type="text" placeholder="nombre amigable"
                    disabled />
                <x-jet-input-error class="text-danger" for="slug" />
            </div>
            {{-- Descripcion --}}
            <div class="form-group mb-4" wire:ignore>
                <x-jet-label value="Descripcion(Opcional)" />
                <textarea class="form-control" wire:model="description" rows="2" placeholder="Ingrese informacion del producto..."
                    wire:model="description"></textarea>
            </div>
            {{-- ESTados --}}
            <div class="form-group">
                <p class="font-weight-bold">Estado</p>
                <label for="status">
                    <input type="radio" wire:model="status" value="2" id="status" name="status">
                    Mostrar
                </label>
                <label for="status">
                    <input type="radio" wire:model="status" value="1" id="status" name="status">
                    No mostrar
                </label>
                <x-jet-input-error class="text-danger" for="status" />
            </div>
            {{-- FIn estado --}}
            {{-- Marcas --}}
            <div class="row">
                <div class="form-group col sm:col-md-auto">
                    <x-jet-label value="Marca" />
                    <select name="brand_id" id="brand_id" class="form-control" wire:model="brand_id">
                        <option value="" selected disabled>Seleccione una marca</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error class="text-danger" for="brand_id" />
                </div>
                @if ($subcategory_id)
                    @if ($this->subcategory->presentation == 1)
                        <div class="form-group col sm:col-md-auto">
                            <x-jet-label value="Stock" />
                            <x-jet-input wire:model="stock" type="number" class="form-control"
                                placeholder="Ingrese la cantidad" />
                            <x-jet-input-error class="text-danger" for="stock" />
                        </div>
                    @endif
                @endif
            </div>
            {{-- fin marcas y stock --}}
            {{-- IMAGEN --}}
            <p>{{ $this->file }}</p>
           
            <div class="row mb-3">
                <div class="col">
                    <div class="image-wrapper" wire:ignore>
                        @isset($product->image)
                            <img id="picture" src="{{ Storage::url($product->image->url) }}" alt="{{ $product->name }}">
                        @else
                            <img id="picture"
                                src="https://images.pexels.com/photos/3965406/pexels-photo-3965406.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                alt="">
                        @endisset
                    </div>
                </div>
                
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('file', 'Imagen que se mostrara en el post') !!}
                        {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*','wire:model'=>'file']) !!}
                        <p class="mt-3">Elige un imagen que relacione a tu producto que estas creando, que sea
                            prefentemente una imagen cuadrada</p>
                        @error('file')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            {{-- FIN DE IMAGEN --}}
        </div>
        <div class="d-flex">
            <button wire:loading.attr="disabled" wire:target="save" wire:click="save"
                class="btn btn-dark  p-2 mb-4 ml-4 ">Guardar Producto</button>
        </div>
    </div>

</div>

