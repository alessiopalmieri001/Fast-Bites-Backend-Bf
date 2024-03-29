<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'name', 
        'description', 
        'price', 
        'availability',
        'img'
    ];

    //Relazione many to many (Food -> Order)
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
