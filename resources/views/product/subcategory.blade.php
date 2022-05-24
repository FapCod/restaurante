<div class="bg-cover w-full " style="background-image: url('{{ asset('img/bgg.png')}}');">
    <x-app-layout>
        SOY EL ARCHIVO SUBCATEGORY.BLADE.PHP
        <div class="container py-8">
            <div class="mb-4">
                <h1 class="underline decoration-wavy text-gray-800 uppercase text-3xl text-center font-bold"> SubCategoria: {{ $subcategory->name }}</h1>
            </div>
            @if ($products->count())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6
                px-4 md:p-4 lg:p-4
                    ">
                    @foreach ($products as $product)
                        {{-- <x-card-product :product="$product" /> --}}
                        <x-card-product-general :product="$product" />
                    @endforeach
                </div>
                
                <div class="mt-4">
                    {{ $products->links() }}
                </div>
            @else
                <div class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-white">
                    <div class="flex items-center justify-center w-12 bg-cyan-600">
                        <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z" />
                        </svg>
                    </div>
    
                    <div class="px-4 py-2 -mx-3">
                        <div class="mx-3">
                            <span class="font-semibold text-indigo-600 ">Info</span>
                            <p class="text-gray-800 dark:text-gray-800 text-xl">No hay productos para esta categoria</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </x-app-layout>
</div>