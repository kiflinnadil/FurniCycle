@extends('components.layout')
@section('title', 'Shop')

@section('content')

<div class="container mx-auto px-4">

    <div class="relative text-center -translate-y-[10%]">
        <div class="mx-auto max-w-5xl px-3 py-6 sm:px-6 lg:px-8 flex items-center justify-center h-[50vh]">
            <h1 class="text-[13vw] text-gray-300 font-bold absolute transform -translate-y-[50%]"
                style="font-family: 'Playfair Display', sans-serif; line-height: 0.9;">
                SHOP
            </h1>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 py-8 sm:py-12 lg:px-8 -mt-[10vh]">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-8">
            @foreach($products as $product)
                <a href="{{ route('shop_details', $product->id) }}" class="group relative overflow-hidden">
                    <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" 
                        class="w-full h-[400px] object-cover group-hover:scale-105 transition-transform duration-300 ease-in-out">
                    <div class="mt-4 px-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700 truncate">
                                {{ $product->name }}
                            </h3>
                            <p class="mt-1 text-sm text-gray-500 truncate">{{ Str::limit($product->description, 50) }}</p>
                        </div>
                        <p class="text-sm font-medium text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="mt-8">
            {{ $products->links() }}
        </div>
    </div>

</div>
@endsection
