<?php

namespace App\Http\Controllers;

use App\Models\ProductTransaction;
use Illuminate\Http\Request;

class ProductTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request->user()->hasRole('admin')) {
            // Admin melihat semua transaksi yang belum dikonfirmasi
            $transactions = ProductTransaction::where('is_paid', false)->latest()->get();
            return view('admin.transactions.index', compact('transactions'));
        }

        // Jika user adalah pelanggan
        $transactions = ProductTransaction::where('user_id', $request->user()->id)->latest()->get();
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'product_name' => 'required|string',
            'phone_number' => 'required|string',
            'address' => 'required|string',
            'post_code' => 'required|string',
            'city' => 'required|string',
            'notes' => 'nullable|string',
            'quantity' => 'required|integer|min:1',
            'sub_total_amount' => 'required|numeric|min:0',
        ]);

        ProductTransaction::create([
            'user_id' => $request->user()->id,
            'product_name' => $validated['product_name'],
            'phone_number' => $validated['phone_number'],
            'address' => $validated['address'],
            'post_code' => $validated['post_code'],
            'city' => $validated['city'],
            'notes' => $validated['notes'],
            'quantity' => $validated['quantity'],
            'sub_total_amount' => $validated['sub_total_amount'],
            'is_paid' => false, // Default: belum terbayar
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    public function confirm($id)
    {
        $transaction = ProductTransaction::findOrFail($id);
        $transaction->update(['is_paid' => true]);

        return redirect()->route('transactions.index')->with('success', 'Transaction confirmed successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(ProductTransaction $productTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductTransaction $productTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductTransaction $productTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductTransaction $productTransaction)
    {
        //
    }
}
