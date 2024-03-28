<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description', 
        'price', 
        'availability',
        'img'
    ];

    //Creata relazione 1 (Restaurant) to many (Foods)
    public function user()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
