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
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">Harga</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">Kota</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">Alamat</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">Kode Pos</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">No Handphone</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tbody>
                        @foreach ($transactions as $transaction)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">{{ $transaction->user->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">{{ $transaction->name }}</td>
                            @foreach ($transaction->transactionDetails as $detail)
                                {{-- <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">{{ $detail->product->name }}</td> --}}
                                <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">{{ $detail->quantity }}</td>
                            @endforeach
                            <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">{{ $transaction->total_price }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">{{ $transaction->city }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">{{ $transaction->address }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">{{ $transaction->post_code }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200">{{ $transaction->phone_number }}</td>
                    
                            <td class="px-6 py-4 text-sm text-gray-700 border-b border-gray-200 h-full">
                                <div class="flex justify-start items-center space-x-2 h-full">
                                    @if ($transaction->status !== 'done')
                                    <button class="bg-green-500 text-white px-4 py-2 rounded-md font-semibold hover:bg-green-600 transition duration-200 confirm-button" data-id="{{ $transaction->id }}">
                                        Confirm
                                    </button>
                                    @else
                                    <span class="text-green-500">Done</span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>                    
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).on('click', '.confirm-button', function() {
        var transactionId = $(this).data('id');
        var $button = $(this);
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var $statusTd = $button.closest('tr').find('.status-column');
        $.ajax({
            url: '/transaction/' + transactionId + '/confirm',
            type: 'POST',
            data: {
                _token: csrfToken
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'done') {
                    $button.replaceWith('<span class="text-green-500">Done</span>');
                    $statusTd.html('<span class="text-green-500">Done</span>');
                    alert(response.message);
                } else {
                    alert('Gagal: ' + (response.message || 'Tidak ada pesan kesalahan'));
                }
            },
            error: function(xhr, status, error) {
                try {
                    var errorResponse = JSON.parse(xhr.responseText);
                    alert('Error: ' + (errorResponse.message || 'Terjadi kesalahan'));
                } catch (e) {
                    alert('Terjadi kesalahan tidak dikenal');
                }
            }
        });
    });
    </script>

</x-app-layout>