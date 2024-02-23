<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Scout\Searchable;
class Supplier extends Model
{
    use HasFactory,Searchable;

    protected $fillable = [
        'company_name',
        'company_abbreviation',
        'email_address',
        'address_id',
    ];
    public function toSearchableArray()
    {
        return [
            'company_name' => $this->company_name,
            'company_abbreviation' => $this->company_abbreviation,
            'email_address' => $this->email_address,
        ];
    }
    public function address() : HasOne
    {
        return $this->hasOne(Address::class,'id','address_id');
    }

    public function products() : HasMany
    {
        return $this->hasMany(Product::class, 'id','supplier_id');
    }
}
