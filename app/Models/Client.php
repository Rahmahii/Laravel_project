<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  use HasFactory;
  protected $fillable = [
    'fname',
    'lname',
    'phone',
    'email',
    'address',
    'country_id',
    'city_id'
  ];
  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function city()
  { 
      return $this->belongsTo(City::class);
  }
  public function country()
  {
      return $this->belongsTo(Country::class);
  }
}
