<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_abbreviation',
        'email_address',
        'address_id',
    ];

    public function address() : HasOne
    {
        return $this->hasOne(Address::class,'id','address_id');
    }

    public function products() : HasMany
    {
        return $this->hasMany(Product::class);
    }
}
