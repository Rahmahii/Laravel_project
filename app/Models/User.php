<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
  use HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'email',
    'password',
    'username',
    'BirthDate',
    'phone',
    'package_id',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];
  public function Package()
  {
    return $this->belongsTo(Package::class);
  }
  public function products()
  {
    return $this->hasMany(Product::class);
  }
  public function categories()
  {
    return $this->hasMany(Category::class);
  }
  public function clients()
  {
    return $this->hasMany(Client::class);
  }
  public function shipments()
  {
    return $this->hasMany(Shipment::class);
  }
}
