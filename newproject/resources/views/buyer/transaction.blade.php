<x-app-layout>
    <div class="container mx-auto px-4 py-10">
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <input type="hidden" name="products[0][id]" value="{{ $product->id }}">
        <input type="hidden" id="hidden-quantity" name="products[0][quantity]" value="1">
        <input type="hidden" name="is_paid" value="paid">
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        
        <div class="flex flex-col lg:flex-row gap-8">
            <div class="w-full lg:w-2/3 p-8 rounded-lg">
                <!-- Customer Information Section -->
                <div class="mb-6 mt-6">
                    <h3 class="text-lg font-medium text-gray-700 mb-4">Customer Information</h3>
                    <x-text-input 
                        id="address" 
                        name="address" 
                        class="w-full px-4 py-3 border rounded-lg text-lg" 
                        placeholder="Address *"
                        type="text" 
                        :value="old('address')" 
                        required 
                    />
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>

                <!-- Billing Details Section -->
                <div>
                    <h3 class="text-lg font-medium text-gray-700 mb-4">Billing Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <x-text-input 
                            id="name" 
                            name="name" 
                            class="w-full px-4 py-3 border rounded-lg text-lg" 
                            placeholder="Full name *"
                            type="text" 
                            :value="old('name')" 
                            required 
                        />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <x-text-input 
                            id="city" 
                            name="city" 
                            class="w-full px-4 py-3 border rounded-lg text-lg" 
                            placeholder="Town / City *"
                            type="text" 
                            :value="old('city')" 
                            required 
                        />
                        <x-input-error :messages="$errors->get('city')" class="mt-2" />

                        <x-text-input 
                            id="post_code" 
                            name="post_code" 
                            class="w-full px-4 py-3 border rounded-lg text-lg" 
                            placeholder="Post Code *"
                            type="text" 
                            :value="old('post_code')" 
                            required 
                        />
                        <x-input-error :messages="$errors->get('post_code')" class="mt-2" />
                    </div>

                    <x-text-input 
                        id="phone_number" 
                        name="phone_number" 
                        class="w-full px-4 py-3 border rounded-lg text-lg mt-4" 
                        placeholder="Phone *"
                        type="text" 
                        :value="old('phone_number')" 
                        required 
                    />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <!-- Payment and Promo Section -->
                <div class="flex space-x-4 mt-4">
                    <select 
                        id="payment_id" 
                        name="payment_id" 
                        class="block w-full rounded-md shadow-sm border-gray-300" 
                        required
                    >
                        <option value="" disabled selected>Payment Method</option>
                        @foreach ($payments as $payment)
                            <option value="{{ $payment->id }}">{{ $payment->payment_method }}</option>
                        @endforeach
                    </select>
                
                    <select 
                        id="promo_code_id" 
                        name="promo_code_id" 
                        class="block w-full rounded-md shadow-sm border-gray-300"
                    >
                        <option value="" disabled selected>Select Promo</option>
                        @foreach ($promo_codes as $promo_code)
                            <option 
                                value="{{ $promo_code->id }}" 
                                data-discount="{{ $promo_code->discount_amount }}"
                            >
                                {{ $promo_code->code }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Additional Information -->
                <div class="mt-6">
                    <h3 class="text-lg font-medium text-gray-700 mb-4">Additional Information</h3>            
                    <x-text-input 
                        id="notes" 
                        name="notes" 
                        class="w-full px-4 py-3 border rounded-lg text-lg" 
                        placeholder="Notes about your order"
                        type="text" 
                        :value="old('notes')" 
                    />
                </div>
            </div>

            <!-- Order Summary Section -->
            <div class="w-full lg:w-1/3 bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold mb-6 text-gray-800">Your Order</h2>
                
                <div class="flex items-center justify-between border-b pb-4 mb-4">
                    <img 
                        src="{{ asset('storage/' . $product->photo) }}" 
                        alt="{{ $product->name }}" 
                        class="w-16 h-16 object-cover rounded-lg"
                    >
                    <div class="ml-4">
                        <p class="text-lg font-medium text-gray-800">{{ $product->name }}</p>

                        <div class="flex items-center mt-3">
                            <button 
                                type="button" 
                                id="decrease" 
                                class="px-4 py-2 bg-gray-300 text-white rounded-l-lg hover:bg-gray-400"
                            >-</button>
                        
                            <div class="mx-3 text-center">
                                <p class="text-sm text-gray-600 font-medium" id="product-quantity">1</p>
                            </div>
                        
                            <button 
                                type="button" 
                                id="increase" 
                                class="px-4 py-2 bg-gray-300 text-white rounded-r-lg hover:bg-gray-400"
                            >+</button>
                        
                            <p class="text-lg font-medium text-gray-800 ml-10">
                                Rp <span id="product-price">{{ number_format($product->price) }}</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <p class="text-xl text-gray-700">Subtotal</p>
                    <p class="text-lg font-bold text-gray-800">
                        Rp <span id="subtotal">{{ number_format($product->price) }}</span>
                    </p>
                </div>

                <div class="flex items-center justify-between border-b pb-4">
                    <p class="text-gray-400">Discount</p>
                    <p class="text-gray-400">Rp <span id="discount-amount">0</span></p>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <p class="text-lg font-bold text-gray-800">Total</p>
                    <p class="text-xl font-bold text-blue-600">
                        Rp <span id="total">{{ number_format($product->price) }}</span>
                    </p>
                </div>

                <div class="flex justify-between mt-6">
                    <button 
                        type="submit" 
                        class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700"
                    >
                        Place Order
                    </button>
                </div>
            </div>
        </div>
        </form>
    </div>

    <script>
        const quantityDisplay = document.getElementById('product-quantity');
        const decreaseButton = document.getElementById('decrease');
        const increaseButton = document.getElementById('increase');
        const subtotalDisplay = document.getElementById('subtotal');
        const totalDisplay = document.getElementById('total');
        const discountDisplay = document.getElementById('discount-amount');
        const price = {{ $product->price }};
        const promoSelect = document.getElementById('promo_code_id');
        const hiddenQuantityInput = document.getElementById('hidden-quantity');

        let currentDiscount = 0;

        function updateSubtotal() {
            const quantity = parseInt(quantityDisplay.textContent);
            let subtotal = quantity * price;
            subtotalDisplay.textContent = subtotal.toLocaleString('id-ID');
        }

        function updateTotal() {
            const quantity = parseInt(quantityDisplay.textContent);
            let total = quantity * price;
            
            if (currentDiscount > 0) {
                total = Math.max(total - currentDiscount, 0);
            }

            totalDisplay.textContent = total.toLocaleString('id-ID');
        }

        function updateHiddenQuantity() {
            const quantity = parseInt(quantityDisplay.textContent);
            hiddenQuantityInput.value = quantity;
        }

        decreaseButton.addEventListener('click', () => {
            let quantity = parseInt(quantityDisplay.textContent);
            if (quantity > 1) {
                quantity--;
                quantityDisplay.textContent = quantity;
                updateSubtotal();
                updateTotal();
                updateHiddenQuantity();
            }
        });

        increaseButton.addEventListener('click', () => {
            let quantity = parseInt(quantityDisplay.textContent);
            quantity++;
            quantityDisplay.textContent = quantity;
            updateSubtotal();
            updateTotal();
            updateHiddenQuantity();
        });

        promoSelect.addEventListener('change', (event) => {
            const selectedOption = event.target.selectedOptions[0];
            currentDiscount = selectedOption ? parseInt(selectedOption.getAttribute('data-discount')) : 0;
            
            discountDisplay.textContent = currentDiscount.toLocaleString('id-ID');
            updateTotal();
        });

        // Initial calculations
        updateSubtotal();
        updateTotal();
        updateHiddenQuantity();
    </script>
</x-app-layout>