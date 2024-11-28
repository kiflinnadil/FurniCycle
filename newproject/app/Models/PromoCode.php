<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PromoCode extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'code',
        'discount_amount'
    ];

    public function product_transaction() : HasMany 
    {
        return $this->hasMany(ProductTransaction::class);
    }
}
