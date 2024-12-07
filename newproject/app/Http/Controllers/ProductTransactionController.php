<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Models\ProductTransaction;
use App\Models\PromoCode;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProductTransactionController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $transactions = ProductTransaction::all();
        return view('transactions.index', compact('transactions', 'products'));
    }

    public function create()
    {
        $payments = Payment::all();
        $promo_codes = PromoCode::all();
        $products = Product::where('is_available', true)->get();
        return view('transactions.create', compact('payments', 'promo_codes', 'products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string',
            'phone_number' => 'required|string',
            'address' => 'required|string',
            'post_code' => 'required|string',
            'city' => 'required|string',
            'notes' => 'nullable|string',
            'is_paid' => 'required|boolean',
            'price' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
            'payment_id' => 'required|exists:payments,id',
            'promo_code_id' => 'nullable|exists:promo_codes,id',
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($validated) {
            $transaction = ProductTransaction::create($validated);

            foreach ($validated['products'] as $productData) {
                $product = Product::findOrFail($productData['id']);

                if ($product->stock < $productData['quantity']) {
                    throw new \Exception("Insufficient stock for product {$product->name}");
                }

                $product->stock -= $productData['quantity'];
                $product->save();

                TransactionDetail::create([
                    'product_transaction_id' => $transaction->id,
                    'product_id' => $product->id,
                    'quantity' => $productData['quantity'],
                    'price' => $product->price * $productData['quantity'],
                    'product_name' => $product->name,
                ]);
            }
        });

        return redirect()->route('admin.product_transactions.index.index')->with('success', 'Transaction created successfully');
    }

    public function show($id)
    {
        $transaction = ProductTransaction::with('transactionDetails')->findOrFail($id);
        return view('transactions.show', compact('transaction'));
    }

    public function destroy($id)
    {
        $transaction = ProductTransaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('admin.product_transactions.index')->with('success', 'Transaction deleted successfully');
    }

    public function generateInvoice($id)
    {
        $transaction = ProductTransaction::with('transactionDetails.product')->findOrFail($id);

        // Generate invoice logic (e.g., PDF generation)
        return view('transactions.invoice', compact('transaction'));
    }

    public function markAsPaid($id)
    {
        $transaction = ProductTransaction::findOrFail($id);
        $transaction->update(['is_paid' => true]);
    
        return redirect()->route('transactions.index')->with('success', 'Transaction marked as paid.');
    }
}

