<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;
class Product extends Model
{
    use HasFactory,Searchable;

    protected $fillable = [
        'supplier_id',
        'bar_code',
        'name',
        'description',
        'unit',
        'quantity',
        'unit_price',
        'delivered_date',
        'image'
    ];
    public function toSearchableArray()
    {
        return [
            'bar_code' => $this->bar_code,
            'name' => $this->name,
            'description' => $this->description,
            'unit' => $this->unit,
        ];
    }
    public function supplier() : BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

}
