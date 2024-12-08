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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProductTransactionController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $transactions = ProductTransaction::all();
        $transaction_details = TransactionDetail::all();
        return view('transactions.index', compact('transactions', 'products', 'transaction_details'));
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
        Log::info('Transaction Store Request:', $request->all());

        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string',
            'address' => 'required|string|max:255',
            'post_code' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'notes' => 'nullable|string|max:500',
            'is_paid' =>  'required|string|in:paid,unpaid',
            'products' => 'required|array|min:1',
            'products.*.id' => 'required_with:products|exists:products,id',
            'products.*.quantity' => 'required_with:products|integer|min:1',
            'discount_amount' => 'nullable|numeric|min:0',
            'user_id' => 'required|exists:users,id',
            'promo_code_id' => 'nullable|exists:promo_codes,id',
            'payment_id' => 'required|exists:payments,id',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'phone_number.regex' => 'Nomor telepon tidak valid.',
            'products.*.id.exists' => 'Produk tidak ditemukan.',
            'products.*.quantity.required' => 'Jumlah produk wajib diisi.',
        ]);

        if ($validator->fails()) {
            Log::error('Validation Errors:', $validator->errors()->toArray());
            return response()->json([
                'status' => 'validation_error',
                'errors' => $validator->errors(),
            ], 422);
        }

        DB::beginTransaction();
        try {
            $validated = $validator->validated();

            // Cek promo code jika ada
            $discount = 0;
            $promoCode = null;
            if ($request->filled('promo_code_id')) {
                $promoCode = PromoCode::find($validated['promo_code_id']);
                $discount = $promoCode ? $promoCode->discount_amount : 0;
            }

            // Membuat transaksi
            $transaction = ProductTransaction::create([
                'name' => $validated['name'],
                'address' => $validated['address'],
                'city' => $validated['city'],
                'post_code' => $validated['post_code'],
                'phone_number' => $validated['phone_number'],
                'payment_id' => $validated['payment_id'],
                'notes' => $validated['notes'] ?? '',
                'promo_code_id' => $promoCode ? $promoCode->id : null,
                'discount_amount' => $discount,
                'user_id' => $validated['user_id']
            ]);

            // Ambil semua produk yang dipilih sekaligus
            $productIds = collect($validated['products'])->pluck('id');
            $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

            // Menyimpan detail transaksi dan menghitung harga
            $totalPrice = 0;
            foreach ($validated['products'] as $productData) {
                $product = $products->get($productData['id']);
                if (!$product || $product->stock < $productData['quantity']) {
                    throw new \Exception("Stok tidak mencukupi untuk produk: {$product->name}");
                }

                $price = $product->price * $productData['quantity'];

                TransactionDetail::create([
                    'product_transaction_id' => $transaction->id,
                    'product_id' => $product->id,
                    'quantity' => $productData['quantity'],
                    'price' => $price,
                ]);

                $totalPrice += $price;

                // Kurangi stok produk
                $product->decrement('stock', $productData['quantity']);
            }

            // Menghitung harga final
            $finalPrice = max($totalPrice - $discount, 0);
            $transaction->update(['total_price' => $finalPrice]);

            DB::commit();

            return redirect()->route('transactions.index')
                ->with('success', 'Transaksi berhasil dibuat.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Transaction Error: ' . $e->getMessage());
            Log::error('Transaction Error Trace: ' . $e->getTraceAsString());

            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan transaksi: ' . $e->getMessage());
        }
    }

    public function checkout($productId)
    {
        $product = Product::findOrFail($productId);
        $payments = Payment::all();
        $promo_codes = PromoCode::all();

        $quantity = $product->quantity;

        return view('buyer.transaction', [
            'product' => $product,
            'quantity' => $quantity,
            'payments' => $payments,
            'promo_codes' => $promo_codes,
        ]);
    }

    public function show($id)
    {
        $transaction = ProductTransaction::with('transactionDetails')->findOrFail($id);
        return view('transactions.show', compact('transaction'));
    }
}
