<div class="bg-cover w-full " style="background-image: url(img/bgg.png)">
    <x-app-layout>
        SOY EL ARCHIVO INDEX.BLADE.PHP
        <div class="container py-8">
            <div class="mb-4">
            <h1 class="underline decoration-wavy text-gray-800 uppercase text-3xl text-center font-bold"> Todos los productos disponibles</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6
                px-4 md:p-4 lg:p-4">
                @foreach ($products as $product)
                    <div class="card w-96 bg-base-100 shadow-xl image-full ">
                        <figure class="w-full bg-cover bg-center">
                            @if ($product->image)
                            <img  src="{{ Storage::url($product->image->url) }}" alt="{{ $product->name}}" />
                            @else
                            <img src="https://images.pexels.com/photos/3965406/pexels-photo-3965406.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="{{ $product->name }}" />
                            @endif
                        </figure>
                        <div class="card-body  ">
                            <h2 class="card-title text-4xl leading-8 font-semibold text-white">
                                <a href="{{ route('product.show',$product) }}">{{ $product->name }}</a>
                            </h2>
                            <p>{{ $product->description }}</p>
                            <div class="text-sm breadcrumbs">
                                @if ($product->stock > 0)
                                    <span class="inline-block px-3 bg-red-600 h-6 text-white rounded-full">Su stock:{{ $product->stock }}</span>
                                @else
                                    <span class="inline-block px-3 bg-red-600 h-6 text-white rounded-full">Tiene stock por presentaciones</span>
                                @endif
                            </div>
                            <div class="text-sm breadcrumbs">
                                <a href="{{ route('product.category',$product->subcategory->category) }}" class="inline-block px-3 mb-4 bg-red-600 h-6 text-white rounded-full hover:bg-white hover:text-black">{{ $product->subcategory->category->name }}</a>
                                
                                <span class="inline-block px-3 bg-red-600 h-6 text-white rounded-full ">&gt</span>
    
                                <a href="{{ route('product.subcategory',$product->subcategory) }}" class="inline-block px-3 bg-red-600 h-6 text-white rounded-full hover:bg-white hover:text-black">{{ $product->subcategory->name }}</a> 
                            </div>
                            <div class="card-actions justify-end">
                                <button class="btn bg-gray-800 text-white">
                                    <a href="{{ route('product.show',$product) }}">Usar</a>     
                                </button>
                            </div>
                            
    
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </x-app-layout>
</div>