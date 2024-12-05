<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        @if (session()->has('success'))
            <x-alert message="{{ session('success') }}"></x-alert>
        @endif

        <div class="flex items-center justify-between mt-8">
            <h2 class="font-semibold text-2xl text-gray-700">Daftar Transaksi Produk</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-8">
            @foreach ($transactions as $transaction)
            <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out overflow-hidden">
                <!-- Display product image -->
                <img src="{{ asset('storage/'.$transaction->product->photo) }}" alt="{{ $transaction->product->name }}" class="w-full h-64 object-cover transition-transform duration-500 ease-in-out transform hover:scale-105">

                <div class="p-6">
                    <!-- Product name and price -->
                    <h3 class="text-2xl font-semibold text-gray-800">{{ $transaction->product->name }}</h3>
                    <p class="text-xl text-gray-600 mt-2">Rp {{ number_format($transaction->product->price, 0, ',', '.') }}</p>

                    <!-- Stock and transaction status -->
                    <div class="flex justify-between mt-4">
                        <p class="text-sm text-gray-500">Stok: <span class="font-medium text-gray-800">{{ $transaction->product->stock }}</span></p>
                        <p class="text-sm {{ $transaction->is_paid ? 'text-green-500' : 'text-red-500' }}">
                            {{ $transaction->is_paid ? 'Transaksi Dikonfirmasi' : 'Menunggu Konfirmasi' }}
                        </p>
                    </div>

                    <!-- Short description of the product -->
                    <p class="mt-4 text-sm text-gray-700">{{ Str::limit($transaction->product->description, 100) }}</p>

                    <!-- Buttons for viewing details and canceling -->
                    <div class="mt-6 flex justify-between items-center">
                        <!-- View Transaction Details -->
                        <a href="{{ route('transactions.show', $transaction->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md font-semibold hover:bg-blue-600 transition duration-200">
                            Lihat Detail
                        </a>

                        <!-- Cancel Button -->
                        <x-danger-button
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-transaction-deletion-{{ $transaction->id }}')"
                        >
                            {{ __('Cancel') }}
                        </x-danger-button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Modal for Confirming Cancellation of a Transaction -->
    @foreach ($transactions as $transaction)
    <x-modal name="confirm-transaction-deletion-{{ $transaction->id }}" focusable>
        <form method="POST" action="{{ route('transactions.destroy', $transaction->id) }}" class="p-6">
            @csrf
            @method('DELETE')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Apakah Anda yakin ingin membatalkan transaksi ini?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Setelah dibatalkan, tindakan ini tidak dapat dibatalkan lagi.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Batal') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Batalkan Transaksi') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
    @endforeach

</x-app-layout>
