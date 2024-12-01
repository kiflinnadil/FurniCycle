<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Psy\TabCompletion\Matcher\FunctionsMatcher;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'payment_method',
        'no_rekening'
    ];

    public function product_transaction_id() : HasMany
    {
        return $this->hasMany (ProductTransaction::class);
    }
}
