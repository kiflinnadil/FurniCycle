<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">

        @if (session()->has('success'))
        <x-alert message="{{ session('success') }}"></x-alert>
        @endif

        <div class="flex items-center justify-between mt-8">
            <h2 class="font-semibold text-2xl text-gray-700">Daftar Pesanan</h2>
        </div>

        <div class="overflow-x-auto mt-6">
            <table class="min-w-full bg-white table-auto border-collapse border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">Pembeli</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">Produk</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">Alamat</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">Status</th>
                        {{-- <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">Aksi</th> --}}
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($product_transactions as $transaction)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">{{ $transaction->product->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">{{ $transaction->user->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">{{ $transaction->user->address }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">{{ $transaction->product_transaction->is_paid}}</td>
                        <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">
                            <img src="{{ asset('storage/'.$product->photo) }}" alt="{{ $product->name }}" class="w-20 h-20 object-cover rounded-md">
                        </td> 

                        <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200 h-full">
                            <div class="flex justify-start items-center space-x-2 h-full">
                                <a href="{{ route('products.edit', $product->id) }}">
                                    <button type="button" class="bg-green-500 text-white px-4 py-2 rounded-md font-semibold hover:bg-green-600 transition duration-200">
                                        Edit
                                    </button>
                                </a>
                        
                                <x-danger-button
                                    x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'confirm-product-deletion-{{ $product->id }}')"
                                >
                                    {{ __('Delete') }}
                                </x-danger-button>
                            </div>
                        </td>
                        
                    </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>

    {{-- @foreach ($products as $product)
    <x-modal name="confirm-product-deletion-{{ $product->id }}" focusable>
        <form method="POST" action="{{ route('products.destroy', $product->id) }}" class="p-6">
            @csrf
            @method('DELETE')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete this product?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once deleted, this action cannot be undone.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Product') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
    @endforeach --}}

</x-app-layout>

{{-- <x-app-layout>
    <div class="max-w-7xl mx-auto mt-6">
        <h2 class="font-semibold text-2xl text-gray-700">Daftar Pesanan</h2>

        <div class="mt-6 bg-white shadow-sm rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produk</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pembeli</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td class="px-6 py-4">{{ $transaction->product_name }}</td>
                            <td class="px-6 py-4">{{ $transaction->user->name }}</td>
                            <td class="px-6 py-4">{{ $transaction->address }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $transaction->is_paid ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $transaction->is_paid ? 'Dikonfirmasi' : 'Menunggu' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                @if (!$transaction->is_paid)
                                    <form action="{{ route('transactions.confirm', $transaction->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Konfirmasi</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout> --}}
