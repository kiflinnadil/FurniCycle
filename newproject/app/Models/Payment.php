<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class Payment extends Model
{
    //
    protected $fillable = [
        'payment_method',
        'amount',
        'payment_status'
    ];

    public function product_transaction_id() : HasMany
    {
        return $this->hasMany (ProductTransaction::class);
    }
}
