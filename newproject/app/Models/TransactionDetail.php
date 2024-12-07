<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
    'price', 
    'product_name', 
    'quantity', 
    'product_id', 
    'product_transaction_id'
];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productTransaction()
    {
        return $this->belongsTo(ProductTransaction::class, 'product_transaction_id');
    }
}