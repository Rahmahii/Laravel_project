<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
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
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
