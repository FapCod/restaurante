<div class="bg-cover w-full " style="background-image: url('{{ asset('img/bgg.png') }}');">
    <x-app-layout>
        
        <div class="container py-8 ">
            <h1 class=" text-4xl font-bold text-gray-800">{{ $product->name }}</h1>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                {{-- contenido principal --}}
                <div class="lg:col-span-2">
                    <figure class="drop-shadow-2xl w-full h-80 object-cover object-center mt-4  ">
                        @if ($product->image)
                            <img class="border-4 border-yellow-500 shadow rounded-t-lg rounded-b-lg w-full  h-80 object-cover object-center"
                                src="{{ Storage::url($product->image->url) }}" alt="{{ $product->name }}">
                        @else
                            <img class="w-full h-80 object-cover object-center"
                                src="https://images.pexels.com/photos/3965406/pexels-photo-3965406.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                alt="{{ $product->name }}" />
                        @endif


                    </figure>
                    <div class="shadow  text-gray-800 mt-4 mb-4">
                        {{ $product->description }}
                    </div>
                    {{-- presentaciones --}}
                    @if (session('status'))
                        <div class="alert alert-danger mb-4" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($presentations->count() > 0)
                        <div class="overflow-x-auto ">
                            {{-- <table class="table w-full ">
                                <thead>
                                    <tr>
                                        <th scope="col">Presentacion</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-indigo-500">
                                    @foreach ($presentations as $presentation)
                                        <tr>
                                            <td>{{ $presentation->name }}</td>
                                            <td>{{ $presentation->stock }}</td>
                                            <form action="{{ route('product.updateStock', $presentation) }}"
                                                method="post">
                                                @csrf
                                                @method('PUT')
                                                <td width="100">
                                                    <input name="stock" id="stock" type="number" placeholder="0"
                                                        class="input input-bordered input-info  w-full max-w-xs">
                                                    @error('stock')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td width="100">
                                                    <button type="submit" class="btn btn-active">
                                                        Usar
                                                    </button>
                                                </td>
                                            </form>
                                        </tr>
                                        @if ($presentation->stock <= 5)
                                            <tr>
                                                <th colspan="4" class="text-center">
                                                    <div class="bg-red-500 text-white p-2">
                                                        <p>
                                                            <i class="fas fa-exclamation-triangle"></i>
                                                            <strong>
                                                                Stock bajo
                                                            </strong>
                                                        </p>
                                                    </div>
                                                </th>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table> --}}
                            <table
                                class="rounded-t-lg rounded-b-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
                                <thead>
                                    <tr class="text-left border-b-2 border-gray-300">
                                        <th class="px-4 py-3">Presentacion</th>
                                        <th class="px-4 py-3">Stock</th>
                                        <th class="px-4 py-3"></th>
                                        {{-- <th class="px-4 py-3"></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($presentations as $presentation)
                                        <tr class="bg-gray-100 border-b border-gray-200">
                                            <td class="px-4 py-3">{{ $presentation->name }}</td>
                                            <td class="px-4 py-3">{{ $presentation->stock }}</td>
                                            <form action="{{ route('product.updateStock', $presentation) }}"
                                                method="post">
                                                @csrf
                                                @method('PUT')
                                                <td class="py-3">
                                                    <input name="stock" id="stock" type="number" required placeholder="0" min="0"
                                                        class="input input-bordered bg-yellow-500 text-white w-full max-w-xs">
                                                    @error('stock')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    
                                                </td>
                                                <td class="">
                                                    <button type="submit" class="ml-4 btn bg-yellow-500 text-white">
                                                        Usar
                                                    </button>
                                                </td>
                                            </form>
                                        </tr>
                                        @if ($presentation->stock <= 5)
                                            <tr>
                                                <th colspan="4" class="text-center">
                                                    <div class="bg-red-500 text-white p-2">
                                                        <p>
                                                            <i class="fas fa-exclamation-triangle"></i>
                                                            <strong>
                                                                Stock bajo
                                                            </strong>
                                                        </p>
                                                    </div>
                                                </th>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                               
                            </table>
                        </div>
                    @endif
                    {{-- fin de presentaciones --}}
                    {{-- stock --}}
                    @if (isset($product->stock))
                        <div class="flex flex-col max-w-md mx-auto overflow-hidden  bg-yellow-500 rounded-lg shadow-lg">
                            <div class=" text-center py-4 px-4">
                                <label class="text-2xl font-bold text-gray-100 ">
                                    <span>Stock</span>
                                    <span>{{ $product->stock }}</span>
                                </label>
                            </div>
                            <div class="py-4 px-4">
                                <form action="{{ route('product.updatestockproduct', $product) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div >
                                        <label class="text-gray-100">
                                            <span class="text-xl font-bold">Cantidad</span>
                                            <input required name="stock" id="stock" type="number" placeholder="0"
                                                class="text-gray-100 bg-blue-600 rounded-lg" min="0" />
                                            @error('stock')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                            <button type="submit" class="btn btn-active hover:btn-primary">
                                                Usar
                                            </button>
                                        </label>
                                    </div>
                                </form>
                            </div>
                            @if ($product->stock == 0)
                                <div class="alert alert-error shadow-lg mt-4">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>Error! No hay Stock.</span>
                                    </div>
                                </div>
                            @elseif ($product->stock <= 5)
                                <div class="alert alert-warning shadow-lg mt-4">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                        <span>Advertencia: Stock Bajo!</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                        
                    @endif
                    {{-- fin de stock --}}
                </div>
                {{-- contenido relacionado --}}
                <aside>
                    <h1 class="text-2xl font-bold text-gray-700 mb-4 ">Mas productos de la Subcategoria
                        {{ $product->subcategory->name }}</h1>
                    <ul>
                        @foreach ($similares as $similar)
                            <li class="mb-4">

                                <a class="flex shadow" href="{{ route('product.show', $similar) }}">
                                    @if ($similar->image)
                                        <img class="w-36 h-20 object-cover object-center"
                                            src="{{ Storage::url($similar->image->url) }}" alt="">
                                    @else
                                        <img class="w-36 h-20 object-cover object-center"
                                            src="https://images.pexels.com/photos/3965406/pexels-photo-3965406.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                            alt="{{ $product->name }}" />
                                    @endif
                                    <div class="flex flex-col">
                                        <span class="ml-2 text-gray-800">
                                            {{ $similar->name }}
                                        </span>
                                        <span class="ml-2 text-gray-800">
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
                {{-- fin contenido relacionado --}}
            </div>
        </div>
    </x-app-layout>
</div>
