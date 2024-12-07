<x-app-layout>
    <div class="container mx-auto px-4 py-10">
        <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <div class="flex flex-col lg:flex-row gap-8">
            
            <div class="w-full lg:w-2/3 p-8 rounded-lg">

                <div class="mb-6 mt-6">
                    <h3 class="text-lg font-medium text-gray-700 mb-4" style="font-family: 'Playfair Display'">Customer Information</h3>
                        <x-text-input id="address" class="w-full px-4 py-3 border rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Address *"
                            type="text" name="address" :value="old('address')" required />
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>

                <div>
                    <h3 class="text-lg font-medium text-gray-700 mb-4" style="font-family: 'Playfair Display'">Billing Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <x-text-input id="name" class="w-full px-4 py-3 border rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Full name *"
                            type="text" name="name" :value="old('name')" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <x-text-input id="city" class="w-full px-4 py-3 border rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Town / City *"
                            type="text" name="city" :value="old('city')" required />
                        <x-input-error :messages="$errors->get('city')" class="mt-2" />

                        <x-text-input id="post_code" class="w-full px-4 py-3 border rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Post Code *"
                            type="text" name="post_code" :value="old('post_code')" required />
                        <x-input-error :messages="$errors->get('post_code')" class="mt-2" />
                    </div>

                    <x-text-input id="phone" class="w-full px-4 py-3 border rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500 mt-4" placeholder="Phone *"
                        type="text" name="phone" :value="old('phone')" required />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    
                </div>

                <div class="flex space-x-4 mt-4">
                    <select id="payment_id" name="payment_id" class="block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-blue-200 focus:border-blue-500" required>
                        <option value="" disabled selected>Payment Method</option>
                        @foreach ($payments as $payment)
                            <option value="{{ $payment->id }}">{{ $payment->payment_method }}</option>
                        @endforeach
                    </select>
                
                    <select id="promo_code_id" name="promo_code_id" class="block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-blue-200 focus:border-blue-500" required>
                        <option value="" disabled selected>Select Promo</option>
                        @foreach ($promo_codes as $promo_code)
                            <option value="{{ $promo_code->id }}" data-discount="{{ $promo_code->discount_amount }}">{{ $promo_code->code }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="mt-6">
                    <h3 class="text-lg font-medium text-gray-700 mb-4" style="font-family: 'Playfair Display'">Additional Information</h3>            
                    <x-text-input id="notes" class="w-full px-4 py-3 border rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Notes about your order, e.g. special notes for delivery"
                        type="text" name="notes" :value="old('notes')" required />
                    <x-input-error :messages="$errors->get('notes')" class="mt-2" />
                </div>
            </div>

            <div class="w-full lg:w-1/3 bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold mb-6 text-gray-800" style="font-family: 'Playfair Display'">Your Order</h2>
                <div class="flex items-center justify-between border-b pb-4 mb-4">
                    <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded-lg">
                    <div class="ml-4">
                        <p class="text-lg font-medium text-gray-800">{{ $product->name }}</p>
                        {{-- <p class="text-sm text-gray-600"> {{ $product->quantity }}</p> --}}

                        <div class="flex items-center mt-3">
                            <button type="button" id="decrease" class="px-4 py-2 bg-gray-300 text-white rounded-l-lg hover:bg-gray-400 transition duration-150 ease-in-out">-</button>
                        
                            <div class="mx-3 text-center">
                                <p class="text-sm text-gray-600 font-medium" id="product-quantity">{{ old('quantity', 1) }}</p>
                            </div>
                        
                            <button type="button" id="increase" class="px-4 py-2 bg-gray-300 text-white rounded-r-lg hover:bg-gray-400 transition duration-150 ease-in-out">+</button>
                        
                            <p class="text-lg font-medium text-gray-800 ml-10">Rp <span id="product-price">{{ number_format($product->price) }}</span></p>
                        </div>
                        
                    </div>
                </div>

                <div class="flex items-center justify-between ">
                    <p class="text-xl text-gray-700">Subtotal</p>
                    <p class="text-lg font-bold text-gray-800">Rp <span id="subtotal">{{ number_format($product->price) }}</span></p>
                </div>

                <div class="flex items-center justify-between border-b pb-4">
                    <p class="text-gray-400">discount</p>
                    <p class="text-gray-400"><span id="discount-amount">0</span></p>
                </div>

                <div></div>

                <div class="flex items-center justify-between mt-4">
                    <p class="text-lg font-bold text-gray-800">Total</p>
                    <p class="text-xl font-bold text-blue-600">Rp <span id="total">{{ number_format($product->price) }}</span></p>
                </div>

                <div class="flex justify-between mt-6">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700 transition duration-200">
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
        const price = {{ $product->price }}; // Get the price from the backend
        const promoSelect = document.getElementById('promo_code_id');
        
        let currentDiscount = 0; // Initialize discount as 0

        // Function to update the subtotal based on quantity
        function updateSubtotal() {
            const quantity = parseInt(quantityDisplay.textContent);
            let subtotal = quantity * price;
            
            subtotalDisplay.textContent = subtotal.toLocaleString('id-ID'); // Format as currency
        }

        // Function to update total based on quantity and discount
        function updateTotal() {
            const quantity = parseInt(quantityDisplay.textContent);
            let total = quantity * price;
            
            // Apply discount if available (subtract discount from total)
            if (currentDiscount > 0) {
                total -= currentDiscount; // Subtract the discount amount from total
            }

            totalDisplay.textContent = total.toLocaleString('id-ID'); // Format as currency
        }

        // Update quantity when the decrease button is clicked
        decreaseButton.addEventListener('click', () => {
            let quantity = parseInt(quantityDisplay.textContent);
            if (quantity > 1) {
                quantity--;
                quantityDisplay.textContent = quantity;
                updateSubtotal(); // Update subtotal
                updateTotal(); // Update total
            }
        });

        // Update quantity when the increase button is clicked
        increaseButton.addEventListener('click', () => {
            let quantity = parseInt(quantityDisplay.textContent);
            quantity++;
            quantityDisplay.textContent = quantity;
            updateSubtotal(); // Update subtotal
            updateTotal(); // Update total
        });

        // Listen for changes in the promo code selection
        promoSelect.addEventListener('change', (event) => {
            const selectedOption = event.target.selectedOptions[0];
            
            // Check if there is a discount amount and assign it
            currentDiscount = selectedOption ? parseInt(selectedOption.getAttribute('data-discount')) : 0;
            
            // Update the discount display
            discountDisplay.textContent = `Rp ${currentDiscount.toLocaleString('id-ID')}`; // Update discount amount

            // Update total after selecting a promo code
            updateTotal();
        });

        // Initial calculation when the page loads
        updateSubtotal(); // Set initial subtotal
        updateTotal(); // Set initial total
    </script>
</x-app-layout>
