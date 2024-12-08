<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductTransaction extends Model
{
    use HasFactory;

    protected $table = 'product_transactions';

    protected $fillable = [
        'name', // Nama
        'phone_number', // Nomor Telepon
        'address', // Alamat
        'post_code', // Kode Pos
        'city', // Kota
        'notes', // Catatan
        'is_paid', // Status Pembayaran
        'total_price', // Total Harga
        'discount_amount', // Diskon
        'user_id', // User yang membuat transaksi
        'promo_code_id', // ID Promo Code
        'payment_id', // ID Pembayaran
    ];

    public function transactionDetails(): HasMany
    {
        return $this->hasMany(TransactionDetail::class, 'product_transaction_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function promoCode(): BelongsTo
    {
        return $this->belongsTo(PromoCode::class, 'promo_code_id');
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }
}
