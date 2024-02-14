<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Customer extends Model
{
    use HasFactory;

    protected $fillable =[
        'first_name',
        'last_name',
        'email_address',
        'address_id'
    ];

    public function address(): HasOne
    {
        return $this->hasOne(Address::class, 'id', 'address_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function receipts(): HasMany
    {
        return $this->hasMany(Receipt::class);
    }
}
