<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PromoCode extends Model
{
    //
    protected $fillable = [
        'code',
        'discount_amount'
    ];

    public function product_transaction() : HasMany 
    {
        return $this->hasMany(ProductTransaction::class);
    }
}
