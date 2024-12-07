<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">

        @if (session()->has('success'))
        <x-alert message="{{ session('success') }}"></x-alert>
        @endif

        <div class="flex items-center justify-between mt-8">
            <h2 class="font-semibold text-2xl text-gray-700">List Transaksi</h2>

        </div>

        <div class="overflow-x-auto mt-6">
            <table class="min-w-full bg-white table-auto border-collapse border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">Pembeli</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">Produk</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">Jumlah</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">Kota</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">Alamat</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">Kode Pos</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">No Handphone</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">Status</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">Note</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">{{ $transaction->user->name }}</td>
                                @foreach ($products as $product)
                                <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">{{ $product->name }}</td>
                                @endforeach
                                <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">{{ $transaction->quantity }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">{{ $transaction->city }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">{{ $transaction->address }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">{{ $transaction->post_code }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">{{ $transaction->phone_number }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">{{ $transaction->is_paid }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">{{ $transaction->notes }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200 h-full">
                                    <div class="flex justify-start items-center space-x-2 h-full">
                                        <a href="#">
                                            <button type="button" class="bg-green-500 text-white px-4 py-2 rounded-md font-semibold hover:bg-green-600 transition duration-200">
                                                Confirm
                                            </button>
                                        </a>
                                    </div>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>                    
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>