<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'height',
        'width',
        'weight',
        'depth',
        'price',
        'image',
        'quantity',
        'SKU',
        'category_id',
        'currency_id',
        'mass_id',
        'distance_id',
            ];

            public function user()
            {
                return $this->belongsTo(User::class);
            }
            public function Distance()
            { 
                return $this->belongsTo(Distance::class);
            }
            public function Mass()
            { 
                return $this->belongsTo(Mass::class);
            }
            public function Category()
            { 
                return $this->belongsTo(Category::class);
            }
            public function Currency()
            { 
                return $this->belongsTo(Currency::class);
            }
          
}
