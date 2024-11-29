<?php

namespace App\Http\Controllers;

use App\Models\PromoCode;
use Illuminate\Http\Request;

class PromoCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $promo_codes = PromoCode::all();
        return view ('admin.promo_codes.index', compact('promo_codes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('admin.promo_codes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'code' => 'required|unique:promo_codes,code',
            'discount_amount' => 'required|numeric|',
        ]);

        PromoCode::create([
            'code' => $request->code,
            'discount_amount' => $request->discount_amount
        ]);

        return redirect()->route('promo_codes.index')->with('success', 'Promo Code berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PromoCode $promoCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PromoCode $promoCode)
    {
        //
        return view('admin.promo_codes.edit', compact('promoCode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PromoCode $promoCode)
    {
        //
        $request->validate([
            'code' => 'required|unique:promo_codes,code',
            'discount_amount' => 'required|numeric|',
        ]);

        $promoCode->update([
            'code' => $request->code,
            'discount_amount' => $request->discount_amount
        ]);

        return redirect()->route('promo_codes.index')->with('success', 'Promo Code berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PromoCode $promoCode)
    {
        //
        $promoCode->delete();

        return redirect()->route('promo_codes.index')->with('success', 'Promo Code berhasil dihapus!'); 
    }
}
