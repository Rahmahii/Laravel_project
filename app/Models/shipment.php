<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
  protected $fillable = [
    'price',
    'weight',
    'carrier_id',
    'client_id',
    'user_id'
  ];
  use HasFactory;
  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function client()
  {
    return $this->belongsTo(Client::class);
  }
  public function carrier()
  {
    return $this->belongsTo(carrier::class);
  }
  public function product()
  {
    return $this->belongsToMany(Product::class,'shipment_product','shipment_id','product_id');
  }
}
