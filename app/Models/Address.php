<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
  use HasFactory;

  protected $fillable =[
    'street_one',
    'street_two',
    'municipality',
    'city',
    'zip_code'
  ];
  public function user() : BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  public function supplier() : BelongsTo
  {
    return $this->belongsTo(Supplier::class);
  }

  public function customer() : BelongsTo
  {
    return $this->belongsTo(Customer::class);
  }
}
