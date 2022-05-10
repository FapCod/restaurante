<x-app-layout>

    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-600">{{ $product->name }}</h1>
        
    
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
           {{-- contenido principal --}}
            <div class="lg:col-span-2">
                <figure class="w-full h-80 object-cover object-center">
                    @if ($product->image)
                        <img class="w-full h-80 object-cover object-center" src="{{ Storage::url($product->image->url) }}" alt="{{ $product->name}}">
                    @else
                        <img class="w-full h-80 object-cover object-center" src="https://images.pexels.com/photos/3965406/pexels-photo-3965406.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="{{ $product->name }}" />
                    @endif
                    
                    
                </figure>
                <div class="text-base text-gray-500 mt-4">
                    {{ $product->description }}
                </div>
            </div>
            {{-- contenido relacionado --}}
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4 ">Mas productos de la Subcategoria {{ $product->subcategory->name }}</h1>
                <ul>
                    @foreach ($similares as $similar )
                        <li class="mb-4">

                            <a class="flex " href="{{ route('product.show',$similar) }}">
                                @if ($similar->image)
                                    <img class="w-36 h-20 object-cover object-center" src="{{ Storage::url($similar->image->url) }}" alt="">
                                @else
                                    <img class="w-36 h-20 object-cover object-center" src="https://images.pexels.com/photos/3965406/pexels-photo-3965406.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="{{ $product->name }}" />
                                @endif
                                <div class="flex flex-col">
                                    <span class="ml-2 text-gray-600">
                                        {{ $similar->name }}
                                    </span>
                                    <span class="ml-2 text-gray-600">
                                        @if ($similar->stock)
                                            Stock:{{ $similar->stock }}
                                        @else
                                            Cuenta con presentaciones 
                                        @endif
                                    </span>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</x-app-layout>