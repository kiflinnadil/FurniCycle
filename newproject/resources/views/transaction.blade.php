@extends('components.layout')

@section('title', 'Checkout Produk')

@section('content')
<div class="container mx-auto px-4 py-10">
    <div class="flex flex-col lg:flex-row gap-8">
        
        <!-- Bagian Form -->
        <div class="w-full lg:w-2/3 p-8 rounded-lg">
            <div class="border-b border-gray-300 relative inline-block text-lg text-gray-700 ">
                <h2 class="text-xl font-bold mb-6 text-gray-800 " style="font-family: 'Playfair Display' ">Checkout Details</h2>
            </div>

            <!-- Informasi Pelanggan -->
            <div class="mb-6 mt-6">
                <h3 class="text-lg font-medium text-gray-700 mb-4" style="font-family: 'Playfair Display'">Customer Information</h3>
                <input type="email" name="email" class="w-full px-4 py-3 border rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Username or Email Address *" required>
            </div>

            <!-- Detail Penagihan -->
            <div>
                <h3 class="text-lg font-medium text-gray-700 mb-4">Billing Details</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <input type="text" name="first_name" class="w-full px-4 py-3 border rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="First name *" required>
                    <input type="text" name="last_name" class="w-full px-4 py-3 border rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Last name *" required>
                </div>
                <input type="text" name="company" class="w-full px-4 py-3 border rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500 mb-4" placeholder="Company name (Optional)">
                <select name="country" class="w-full px-4 py-3 border rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500 mb-4">
                    <option value="US">United States (US)</option>
                    <option value="ID">Indonesia</option>
                </select>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <input type="text" name="address" class="w-full px-4 py-3 border rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="House number and street name *" required>
                    <input type="text" name="address_optional" class="w-full px-4 py-3 border rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Apartment, suite, unit, etc. (Optional)">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <input type="text" name="city" class="w-full px-4 py-3 border rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Town / City *" required>
                    <input type="text" name="zip" class="w-full px-4 py-3 border rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="ZIP Code *" required>
                </div>
                <input type="tel" name="phone" class="w-full px-4 py-3 border rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500 mt-4" placeholder="Phone *" required>
            </div>

            <!-- Informasi Tambahan -->
            <div class="mt-6">
                <h3 class="text-lg font-medium text-gray-700 mb-4">Additional Information</h3>
                <textarea name="notes" class="w-full px-4 py-3 border rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
            </div>
        </div>

        <!-- Ringkasan Pesanan -->
        <div class="w-full lg:w-1/3 bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold mb-6 text-gray-800">Your Order</h2>
            <div class="flex items-center justify-between border-b pb-4 mb-4">
                <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded-lg">
                <div class="ml-4">
                    <p class="text-lg font-medium text-gray-800">{{ $product->name }}</p>
                    <p class="text-sm text-gray-600">× 1</p>
                </div>
                <p class="text-lg font-medium text-gray-800">Rp {{ number_format($product->price) }}</p>
            </div>
            <div>
                <button 
                    @click="quantity = Math.max(1, quantity - 1)" 
                    class="px-3 py-2 bg-gray-300 rounded hover:bg-gray-400">
                    -
                </button>
            </div>
            <div class="flex items-center justify-between border-b pb-4">
                <p class="text-lg text-gray-700">Subtotal</p>
                <p class="text-lg font-medium text-gray-800">Rp {{ number_format($product->price) }}</p>
            </div>
            <div class="flex items-center justify-between mt-4">
                <p class="text-lg font-bold text-gray-800">Total</p>
                <p class="text-xl font-bold text-blue-600">Rp {{ number_format($product->price) }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
