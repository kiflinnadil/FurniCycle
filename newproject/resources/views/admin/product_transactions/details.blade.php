@foreach ($transactions as $transaction)
    <tr>
        <td>{{ $transaction->product_name }}</td>
        <td>{{ $transaction->quantity }}</td>
        <td>{{ $transaction->total_amount }}</td>
        <td>
            @foreach ($transaction->transaction_details as $detail)
                <div>{{ $detail->product_name }} ({{ $detail->quantity }} x {{ $detail->price }})</div>
            @endforeach
        </td>
    </tr>
@endforeach
