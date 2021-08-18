<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = [
        'name'
    ];
    public function client()
    {
        return $this->hasMany(Client::class);
    }
    public function city()
    {
        return $this->hasMany(City::class);
    }
}
