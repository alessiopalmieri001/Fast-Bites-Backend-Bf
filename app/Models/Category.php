<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //Relazione many to many (Restaurant -> Category)
    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }
}
