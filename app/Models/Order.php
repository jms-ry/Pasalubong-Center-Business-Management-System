<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'product_id',
        'quantity',
        'total_cost',
    ];
    public function product() : HasOne
    {
        return $this->hasOne(Product::class,'id','product_id');
    }

    public function customer() :BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function receipt() :BelongsTo
    {
        return $this->belongsTo(Receipt::class);
    }
}
