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
</x-app-layout>

@endsection --}}

@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-6">Shop</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($products as $product)
            <div class="bg-white rounded-lg shadow p-4">
                <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" class="rounded-lg w-full h-40 object-cover mb-4">
                <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                <p class="text-gray-500">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                <p class="text-gray-700 mt-2 text-sm">{{ $product->description }}</p>
                <button class="bg-blue-500 text-white mt-4 py-2 px-4 rounded hover:bg-blue-600">
                    Add to Cart
                </button>
            </div>
        @empty
            <p class="text-gray-500">Tidak ada produk yang tersedia.</p>
        @endforelse
    </div>
    <div class="mt-6">
        {{ $products->links() }}
    </div>
</div>
@endsection

