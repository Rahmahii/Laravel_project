<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipment_product extends Model
{
  public $timestamps = false;
  protected $table = 'shipments_products';
  protected $fillable = [
    'product_id',
    'shipment_id',
    'price',
    'quantity',
  ];
}
