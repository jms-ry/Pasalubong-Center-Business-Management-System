<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Scout\Searchable;
class Customer extends Model
{
  use HasFactory, Searchable;

  protected $fillable =[
    'first_name',
    'last_name',
    'email_address',
    'address_id'
  ];

  public function toSearchableArray()
  {
    return [
      'first_name' => $this->first_name,
      'last_name' => $this->last_name,
      'email_address' => $this->email_address,
    ];
  }
  public function address(): HasOne
  {
    return $this->hasOne(Address::class, 'id', 'address_id');
  }

  public function orders(): HasMany
  {
    return $this->hasMany(Order::class);
  }

}
