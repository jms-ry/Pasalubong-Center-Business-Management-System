<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Employee extends Model
{
    use HasFactory,Searchable;

    protected $fillable = [
      'user_id' 
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
