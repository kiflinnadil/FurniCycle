<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">

        @if (session()->has('success'))
        <x-alert message="{{ session('success') }}"></x-alert>
        @endif

        <div class="flex items-center justify-between mt-8">
            <h2 class="font-semibold text-2xl text-gray-700">List Produk</h2>

            <a href="{{ route('products.create') }}">
                <button class="bg-gray-500 text-white px-6 py-2 rounded-md font-semibold hover:bg-gray-600 transition ease-in-out duration-200">Tambah</button>
            </a>
        </div>

        <div class="overflow-x-auto mt-6">
            <table class="min-w-full bg-white table-auto border-collapse border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">No</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">Nama Produk</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">Stok</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">Deskripsi</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">Harga</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">Foto Produk</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">{{ $product->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">{{ $product->stock }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">{{ Str::limit($product->description, 50) }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">Rp {{ number_format($product->price, 0, ',') }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">
                            <img src="{{ asset('storage/'.$product->photo) }}" alt="{{ $product->name }}" class="w-20 h-20 object-cover rounded-md">
                        </td> 

                        <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200 h-full">
                            <div class="flex justify-start items-center space-x-2 h-full">
                                <a href="{{ route('products.edit', $product->id) }}">
                                    <button type="button" class="bg-green-500 text-white px-4 py-2 rounded-md font-semibold hover:bg-green-600 transition duration-200">
                                        Edit
                                    </button>
                                </a>
                        
                                <x-danger-button
                                    x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'confirm-product-deletion-{{ $product->id }}')"
                                >
                                    {{ __('Delete') }}
                                </x-danger-button>
                            </div>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @foreach ($products as $product)
    <x-modal name="confirm-product-deletion-{{ $product->id }}" focusable>
        <form method="POST" action="{{ route('products.destroy', $product->id) }}" class="p-6">
            @csrf
            @method('DELETE')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete this product?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once deleted, this action cannot be undone.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Product') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
    @endforeach

</x-app-layout>


{{-- <x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        <div class="mt-6">
            <h2 class="font-semibold text-4xl text-center text-gray-800" style="font-family: 'Playfair Display', serif;">FurniCycle</h2>
        </div>

        <div class="flex items-center justify-between mt-8">
            <h2 class="font-semibold text-2xl text-gray-700">List Product</h2>
            <button class="bg-gray-500 text-white px-6 py-3 rounded-md font-semibold hover:bg-gray-500 transition ease-in-out duration-200">Tambah</button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-8">
            @foreach ($products as $product)
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out overflow-hidden">
                    <img src="{{ url('storage/'.$product->photo) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover transition-transform duration-500 ease-in-out transform hover:scale-105">

                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-gray-800">{{ $product->name }}</h3>
                        <p class="text-xl text-gray-600 mt-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

                        <div class="flex justify-between mt-4">
                            <p class="text-sm text-gray-500">Stock: <span class="font-medium text-gray-800">{{ $product->stock }}</span></p>
                            <p class="text-sm {{ $product->is_available ? 'text-green-500' : 'text-red-500' }}">{{ $product->is_available ? 'Available' : 'Out of Stock' }}</p>
                        </div>

                        <p class="mt-4 text-sm text-gray-700">{{ Str::limit($product->description, 100) }}</p>

                        <div class="mt-6 flex justify-center">
                            <a class="bg-gray-100 px-10 py-2 rounded-md font-semibold text-gray-600 hover:text-gray-800 transition duration-200">Edit</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout> --}}
