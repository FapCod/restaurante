<div class="shadow-lg p-3 mb-5 bg-white rounded">
    <div class="form-group">
        {!! Form::label('category_id', 'Selecciona la Categoria:') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una categoria...', 'wire:model' => 'category_id']) !!}
        @error('category_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('subcategory_id', 'Selecciona la Subcategoria:') !!}
        {!! Form::select('subcategory_id', $subcategories, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una subcategoria...', 'wire:model' => 'subcategory_id']) !!}

        @error('subcategory_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        {!! Form::label('brand_id', 'Selecciona la Marca:') !!}

        {!! Form::select('brand_id', $brands, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una Marca...', 'wire:model' => 'brand_id']) !!}

        @error('brand_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('name', 'Nombre') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Ingresa el nombre de la producto', 'autocomplete' => 'off']) !!}

        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Descripcion &#40; campo opcional &#41;') !!}
        {!! Form::text('description', null, ['class' => 'form-control', 'id' => 'description', 'placeholder' => 'Ingresa una descripcion &#40; campo opcional &#41;']) !!}
    </div>
    {{-- si es que tiene presentacion preguntar --}}
    @if ($subcategory_id)
        @if (!$this->subcategory->presentation)
            <div class="form-group">
                {!! Form::label('stock', 'Stock') !!}
                {!! Form::number('stock', null, ['class' => 'form-control', 'id' => 'stock', 'placeholder' => 'Ingresa el stock del producto']) !!}
                @error('stock')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        @endif
    @endif

    {{-- fin de pregunta si tiene presentacion --}}

    <div class="form-group">
        <p class="font-weight-bold">Estado</p>
        <label>
            {!! Form::radio('status', 1, true) !!} No mostrar
        </label>
        <label>
            {!! Form::radio('status', 2) !!} Mostrar
        </label>
        @error('status')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="row mb-3">
        <div class="col">
            <div class="image-wrapper">
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
                {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
                <p class="mt-3">Elige un imagen que relacione a tu producto que estas creando, que sea
                    prefentemente una imagen cuadrada</p>
                @error('file')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('slug', 'Slug') !!}
        {!! Form::text('slug', null, ['class' => 'form-control ', 'id' => 'slug', 'readonly']) !!}
        @error('slug')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
@if ($this->subcategory)
    @if ($this->subcategory->presentation)
        @livewire('admin.presentation-product', ['product' => $this->product], key($product->id))
    @endif
@endif
