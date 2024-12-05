<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductTransaction;

class ProductTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request->user()->role('owner')) {
            // Admin melihat semua transaksi yang belum dikonfirmasi
            $transactions = ProductTransaction::where('is_paid', false)->latest()->get();
            return view('admin.product_transactions.index', compact('product_transactions'));
        }

        // Jika user adalah pelanggan
        $transactions = ProductTransaction::where('user_id', $request->user()->id)->latest()->get();
        return view('product_transactions.index', compact('product_transactions'));
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
    $validated = $request->validate([
        'product_name' => 'required|string',
        'phone_number' => 'required|string|max:15',
        'address' => 'required|string|max:255',
        'post_code' => 'required|string|max:10',
        'city' => 'required|string|max:100',
        'notes' => 'nullable|string',
        'quantity' => 'required|integer|min:1',
    ]);

    $product = Product::findOrFail($request->product_id);

    $totalPrice = $product->price * $validated['quantity'];

    ProductTransaction::create([
        'user_id' => $request->user()->id,
        'product_name' => $product->name,
        'phone_number' => $validated['phone_number'],
        'address' => $validated['address'],
        'post_code' => $validated['post_code'],
        'city' => $validated['city'],
        'notes' => $validated['notes'],
        'quantity' => $validated['quantity'],
        'sub_total_amount' => $totalPrice,
        'is_paid' => false,
    ]);

    $product->update([
        'stock' => $product->stock - $validated['quantity'],
    ]);

    return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dibuat.');
}

    public function confirm($id)
    {
        $transaction = ProductTransaction::findOrFail($id);
        $transaction->update(['is_paid' => true]);

        return redirect()->route('transactions.index')->with('success', 'Transaction confirmed successfully.');

    }

    public function checkout($productId)
    {
        $product = Product::findOrFail($productId);

        $quantity = $product->quantity;

        return view('transaction', [
            'product' => $product,
            'quantity' => $quantity,
        ]);
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
