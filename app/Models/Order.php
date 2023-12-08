<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    public function products() : HasMany
    {
        return $this->hasMany(Product::class);
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
