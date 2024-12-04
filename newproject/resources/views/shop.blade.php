@extends('components.layout')
@section('title', 'Shop')

@section('content')

<div class="container mx-auto px-4">

    <div class="min-h-full text-center relative">
        <main>
            <div class="mx-auto max-w-5xl px-3 py-6 sm:px-6 lg:px-8 flex items-center justify-center h-screen lg:w-1/2">
                <h1 class="text-[12vw] text-gray-200 font-bold absolute transform -translate-y-[100%]" style="font-family: 'Playfair Display', sans-serif; line-height: 0.9; top: 20%;">
                    SHOP
                </h1>
            </div>
        </main>
    </div>
    
    <div class="transform -translate-y-[30%]">
        <div class="mx-auto max-w-full px-0 py-16 sm:px-0 sm:py-24 lg:px-0">
            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-20 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-18 w-full">
                @foreach($products as $product)
                    <div class="group relative overflow-hidden">
                        <!-- Gambar produk dengan tinggi eksplisit -->
                        <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" class="w-full h-[400px] object-cover group-hover:opacity-75">
                        <div class="mt-4 px-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-gray-700">
                                    <a href="#">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{ $product->name }}
                                    </a>
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">{{ $product->description }}</p>
                            </div>
                            <p class="text-sm font-medium text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    </div>
@endsection

{{-- <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 transform -translate-y-[5%]">
        @foreach($products as $product)
        <div class="border rounded-lg shadow-sm overflow-hidden bg-white -translate-y-[100%]" style="top: 0%;">
            <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <h2 class="text-lg font-semibold text-gray-700">{{ $product->name }}</h2>
                <p class="text-gray-500 text-sm">{{ $product->description }}</p>
                <div class="mt-4 flex items-center justify-between">
                    <span class="text-green-700 font-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                    <a href="{{ route('transactions.create', ['product' => $product->id]) }}" 
                        class="px-4 py-2 bg-green-700 text-white rounded hover:bg-green-600">
                        Pesan
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div> --}}