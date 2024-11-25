<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductTransaction extends Model
{
    //
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
    ];

    public function user() : BelongsTo 
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function promo_code() : BelongsTo 
    {
        return $this->belongsTo(PromoCode::class, 'promo_code_id');
    }
}

