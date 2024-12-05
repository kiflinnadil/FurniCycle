@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Unconfirmed Transactions</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Buyer</th>
                <th>Quantity</th>
                <th>Sub Total</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
            <tr>
                <td>{{ $transaction->product_name }}</td>
                <td>{{ $transaction->user->name }}</td>
                <td>{{ $transaction->quantity }}</td>
                <td>{{ $transaction->sub_total_amount }}</td>
                <td>{{ $transaction->is_paid ? 'Paid' : 'Unpaid' }}</td>
                <td>
                    @if(!$transaction->is_paid)
                        <a href="{{ route('transactions.confirm', $transaction->id) }}" class="btn btn-success">Confirm Payment</a>
                    @else
                        <span class="badge bg-success">Paid</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
