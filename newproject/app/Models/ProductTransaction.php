<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Prompts\Prompt;

class ProductTransaction extends Model
{
    //
    use HasFactory;

    protected $table = 'product_transactions';

    protected $fillable = [
        'product_name',
        'quantity',
        'phone_number',
        'address',
        'post_code',
        'city',
        'notes',
        'is_paid',
        'price',
        'user_id',
        'promo_code_id',
        'payment_id',
    ];

    public function product()
    {
        return $this->belongsToMany(Product::class, 'transaction_details');
    }
    
    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }

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
}