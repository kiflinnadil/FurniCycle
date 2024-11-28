<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductTransaction extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'product_name',
        'phone_number',
        'address',
        'post_code',
        'city',
        'notes',
        'is_paid',
        'quantity',
        'sub_total_amount',
        'user_id',
        'promo_code_id',
        'transaction_details_id',
        'payment_id'
    ];

    public function user() : BelongsTo 
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function promo_code() : BelongsTo 
    {
        return $this->belongsTo(PromoCode::class, 'promo_code_id');
    }

    public function payment() : BelongsTo 
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }

    public function transaction_details() : HasMany 
    {
        return $this->hasMany(TransactionDetail::class, 'transaction_details_id');
    }


}

