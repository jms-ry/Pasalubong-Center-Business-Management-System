<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'bar_code',
        'name',
        'description',
        'unit',
        'quantity',
        'unit_price',
        'delivered_date'
    ];

    public function supplier() : BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function order() : BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
