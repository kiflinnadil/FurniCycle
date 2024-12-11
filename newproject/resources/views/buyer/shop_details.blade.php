@extends('components.layout')
@section('title', 'Detail Produk')

@section('content')
<div x-data="{ isOpen: false, quantity: 1, price: {{ $product->price }} }">
    <a href="/shop" style="margin-bottom: 20px; display: inline-block; text-decoration: none; color: #007bff; font-size: 18px; font-weight: bold;">
        ← 
    </a>
    <div class="product-details-container" style="display: flex; gap: 40px; padding: 40px; max-width: 1200px; margin: auto; font-family: 'Georgia', serif; color: #333; align-items: flex-start;">


        <div class="product-image" style="flex: 1; text-align: center; display: flex; justify-content: center; align-items: center; height: 100%; ">
            <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" style="max-width: 90%; height: 500px; object-fit: cover;">
        </div>

        <div class="product-info" style="flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
            <h1 style="font-size: 32px; font-weight: bold; text-transform: uppercase; margin-bottom: 20px;">{{ $product->name }}</h1>

            <p style="font-size: 16px; color: #999; margin-bottom: 30px;">
                <a href="/" style="text-decoration: none; color: #333;">Home</a> / 
                <a href="/shop" style="text-decoration: none; color: #333;">{{ $product->category->name }}</a> / {{ $product->name }}
            </p>

            <div style="font-size: 24px; color: gray; font-weight: bold; margin-bottom: 20px;">
                <span>Rp {{ number_format($product->price, 0, ',', '.') }}</span>
            </div>

            <div style="font-size: 16px;">
                <span>Stock:  {{ $product->stock }}</span>
            </div>

            <p class="mt-3" style="font-size: 16px; color: #666;">& Free Shipping</p>

            <p style="font-size: 18px; line-height: 1.8; color: #555; margin-top: 20px;">
                {{ $product->description }}
            </p>

                <div style="display: flex; gap: 20px; margin-top: 40px;">
                    <a href="{{ route('transactions.checkout', ['productId' => $product->id]) }}">
                        <button 
                            style="padding: 12px 30px; background-color: #007bff; color: white; border: none; border-radius: 8px; font-size: 18px; cursor: pointer;">
                            Beli Sekarang
                        </button>
                    </a>
                </div>           
        </div>
    </div>
</div>
@endsection
