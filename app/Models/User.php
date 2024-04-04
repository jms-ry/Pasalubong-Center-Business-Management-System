<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable, Searchable;

  /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
  */
  protected $fillable = [
    'name',
    'email',
    'role',
    'password',
    'address_id'
  ];

  /**
    * The attributes that should be hidden for serialization.
    *
    * @var array<int, string>
  */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
    * The attributes that should be cast.
    *
    * @var array<string, string>
  */
  protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
  ];

  public function isAdmin()
  {
    return $this->role === 'admin';
  }
  public function toSearchableArray()
  {
    return [
      'name' => $this->name,
      'email' => $this->email,
      'role' => $this->role
    ];
  }
    
  public function address(): HasOne
  {
    return $this->hasOne(Address::class,'id','address_id');
  }

  public function dtrs(): HasMany
  {
    return $this->hasMany(Dtr::class);
  }

  public function logs(): HasMany
  {
    return $this->hasMany(Log::class);
  }

  public function orders(): HasMany
  {
    return $this->hasMany(Order::class);
  }
  public function employee(): HasOne
  {
    return $this->hasOne(Employee::class);
  }
}
