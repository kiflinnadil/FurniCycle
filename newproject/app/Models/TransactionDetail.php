<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionDetail extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'price',
        'product_name',
        'quantity',
        'product_transaction_id',
        'product_id'
    ];

    public function product() : BelongsTo
    {
        return $this->belongsTo (Product::class, 'product_id');
    }

    public function product_transaction() : BelongsTo
    {
        return $this->belongsTo(ProductTransaction::class, 'product_transaction_id');
    }
}
