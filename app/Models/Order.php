<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
  use HasFactory;
  protected $fillable = [
    'customer_id',
    'user_id',
    'discount',
    'grand_total',
    'total'
  ];
    
  public function customer() :BelongsTo
  {
    return $this->belongsTo(Customer::class);
  }

  public function order_items() :HasMany
  {
    return $this->hasMany(OrderItem::class);
  }

  public function user() :BelongsTo
  {
    return $this->belongsTo(User::class);
  }
}
