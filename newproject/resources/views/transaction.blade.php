@extends('components.layout')

@section('title', 'Checkout Produk')

@section('content')
<div class="container mx-auto px-4 py-10">
    <div class="flex flex-col lg:flex-row gap-8">
        
        <div class="w-full lg:w-2/3 p-8 rounded-lg">

            <div class="mb-6 mt-6">
                <h3 class="text-lg font-medium text-gray-700 mb-4" style="font-family: 'Playfair Display'">Customer Information</h3>
                <input type="email" name="email" class="w-full px-4 py-3 border rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Address *" required>
            </div>

            <div>
                <h3 class="text-lg font-medium text-gray-700 mb-4" style="font-family: 'Playfair Display'">Billing Details</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <input type="text" name="first_name" class="w-full px-4 py-3 border rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Full name *" required>
                    <select id="payment_id" name="payment_id" class="w-full px-4 py-3 border rounded-lg text-lg" required>
                        <option value="1">Mobile Banking</option>
                        <option value="2">Cash On Delivery</option>
                    </select>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <input type="text" name="city" class="w-full px-4 py-3 border rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Town / City *" required>
                    <input type="text" name="zip" class="w-full px-4 py-3 border rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="ZIP Code *" required>
                </div>
                <input type="tel" name="phone" class="w-full px-4 py-3 border rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500 mt-4" placeholder="Phone *" required>
            </div>

            <div class="mt-6">
                <h3 class="text-lg font-medium text-gray-700 mb-4" style="font-family: 'Playfair Display'">Additional Information</h3>
                <textarea name="notes" class="w-full px-4 py-3 border rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
            </div>
        </div>

        <div class="w-full lg:w-1/3 bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold mb-6 text-gray-800" style="font-family: 'Playfair Display'">Your Order</h2>
            <div class="flex items-center justify-between border-b pb-4 mb-4">
                <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded-lg">
                <div class="ml-4">
                    <p class="text-lg font-medium text-gray-800">{{ $product->name }}</p>
                    <p class="text-sm text-gray-600">× 1</p>
                </div>
                <p class="text-lg font-medium text-gray-800">Rp {{ number_format($product->price) }}</p>
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
