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
            <p style="font-size: 16px; color: #666;">& Free Shipping</p>

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
                <a href="">
                    <button 
                        style="padding: 12px 30px; background-color: #6c757d; color: white; border: none; border-radius: 8px; font-size: 18px; cursor: pointer;">
                        Tambahkan ke Keranjang
                    </button>
                </a>
            </div>            
        </div>
    </div>

    {{-- <!-- Pop-up Modal -->
    <form action="# }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="price" :value="price">
        <input type="hidden" name="quantity" :value="quantity">
        <div x-show="isOpen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" x-cloak>
            <div class="bg-white p-8 rounded-lg shadow-lg w-96">
                <h2 class="text-2xl font-semibold text-center mb-4">Konfirmasi Pembelian</h2>
                <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" class="mx-auto mb-4 w-3/4 h-48 object-cover rounded-lg">
                <h1 class="text-xl font-bold mb-4 text-center">{{ $product->name }}</h1>
                <p class="text-gray-700 text-lg text-center mb-6">Harga: Rp {{ number_format($product->price) }}</p>

                <!-- Alamat dan Nomor Telepon -->
                <div class="mb-4">
                    <label for="address" class="block text-lg font-medium text-gray-600">Alamat Pengiriman</label>
                    <input type="text" id="address" name="address" class="w-full px-4 py-3 border rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan alamat lengkap" required>
                </div>
                <div class="mb-4">
                    <label for="phone_number" class="block text-lg font-medium text-gray-600">Nomor Telepon</label>
                    <input type="text" id="phone_number" name="phone_number" class="w-full px-4 py-3 border rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan nomor telepon" required>
                </div>

                <!-- Jumlah Barang -->
                <div class="flex items-center justify-between mb-4">
                    <span class="text-lg font-medium">Jumlah:</span>
                    <div class="flex items-center">
                        <button @click="quantity = Math.max(1, quantity - 1)" class="px-4 py-2 bg-gray-300 rounded-lg text-lg focus:outline-none">-</button>
                        <span x-text="quantity" class="mx-6 text-xl font-semibold"></span>
                        <button @click="quantity++" class="px-4 py-2 bg-gray-300 rounded-lg text-lg focus:outline-none">+</button>
                    </div>
                </div>

                <!-- Total Harga -->
                <div class="mb-6">
                    <p class="text-xl font-semibold text-center">
                        Total Harga: 
                        <span x-text="(price * quantity).toLocaleString('id-ID', { style: 'currency', currency: 'IDR' })"></span>
                    </p>
                </div>

                <div class="flex justify-between gap-4">
                    <button @click="isOpen = false" type="button" class="px-6 py-3 bg-gray-300 text-lg rounded-lg">Batal</button>
                    <button type="submit" class="px-6 py-3 bg-blue-500 text-white text-lg rounded-lg">Konfirmasi Pembelian</button>
                </div>
            </div>
        </div>
    </form> --}}
</div>
@endsection
