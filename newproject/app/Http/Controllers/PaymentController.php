<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $payments = Payment::all();
        return view ('admin.payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('admin.payments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'payment_method' => 'required',
            'no_rekening' => 'required',
        ]);

        Payment::create([
            'payment_method' => $request->payment_method,
            'no_rekening' => $request->no_rekening,
        ]);

        return redirect()->route('payments.index')->with('success', 'Payment berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
        return view('admin.payments.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
        $request->validate([
            'payment_method' => 'required',
            'no_rekening' => 'required',
        ]);
    
        $payment->update([
            'payment_method' => $request->payment_method,
            'no_rekening' => $request->no_rekening,
        ]);
    
        return redirect()->route('payments.index')->with('success', 'Payment berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
        $payment->delete();

        return redirect()->route('payments.index')->with('success', 'Payment berhasil dihapus!');
    }
}
