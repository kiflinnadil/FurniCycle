<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductTransaction;
use App\Models\PromoCode;

class ProductTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->user()->role('owner')) {
            // Admin melihat semua transaksi yang belum dikonfirmasi
            $transactions = ProductTransaction::where('is_paid', false)->latest()->get();
            return view('admin.product_transactions.index', compact('transactions'));
        }

        // Jika user adalah pelanggan
        $transactions = ProductTransaction::where('user_id', $request->user()->id)->latest()->get();
        return view('product_transactions.index', compact('transactions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'phone_number' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'post_code' => 'required|string|max:10',
            'city' => 'required|string|max:100',
            'notes' => 'nullable|string',
            'quantity' => 'required|integer|min:1',
            'promo_code_id' => 'nullable|exists:promo_codes,id', // Add promo_code validation
            'payment_id' => 'required|exists:payments,id', // Validate payment method
        ]);

        $product = Product::findOrFail($request->product_id);

        // Check if promo code is applied
        $promoCode = PromoCode::find($request->promo_code_id);
        $discountAmount = $promoCode ? $promoCode->discount_amount : 0;

        // Calculate the total price with the discount
        $totalPrice = $product->price * $validated['quantity'] - $discountAmount;

        // Create the transaction
        $transaction = ProductTransaction::create([
            'user_id' => $request->user()->id,
            'product_name' => $product->name,
            'phone_number' => $validated['phone_number'],
            'address' => $validated['address'],
            'post_code' => $validated['post_code'],
            'city' => $validated['city'],
            'notes' => $validated['notes'],
            'quantity' => $validated['quantity'],
            'sub_total_amount' => $product->price * $validated['quantity'], // Store the subtotal without discount
            'total_amount' => $totalPrice, // Store the total after discount
            'is_paid' => false,
            'payment_id' => $validated['payment_id'], // Store the payment method
            'promo_code_id' => $request->promo_code_id, // Store the promo code ID
        ]);

        // Update the product stock
        $product->update([
            'stock' => $product->stock - $validated['quantity'],
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dibuat.');
    }

    /**
     * Confirm a transaction as paid.
     */
    public function confirm($id)
    {
        $transaction = ProductTransaction::findOrFail($id);
        $transaction->update(['is_paid' => true]);

        return redirect()->route('transactions.index')->with('success', 'Transaction confirmed successfully.');
    }

    /**
     * Show the checkout page for a product.
     */
    public function checkout($productId)
    {
        $product = Product::findOrFail($productId);
        $payments = Payment::all();
        $promo_codes = PromoCode::all();

        return view('buyer.transaction', [
            'product' => $product,
            'payments' => $payments,
            'promo_codes' => $promo_codes
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
