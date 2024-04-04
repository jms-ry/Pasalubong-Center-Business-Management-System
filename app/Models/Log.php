<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;
class Log extends Model
{
  use HasFactory,Searchable;
  public function user() : BelongsTo
  {
    return $this->belongsTo(User::class);
  }
  public function toSearchableArray()
  {
    return [
      'action' => $this->action,
    ];
  }
}
