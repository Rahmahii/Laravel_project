<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_shipment extends Model
{
  public $timestamps = false;
  protected $table = 'product_shipment';
  protected $fillable = [
    'product_id',
    'shipment_id',
    'price',
    'quantity',
  ];

}
