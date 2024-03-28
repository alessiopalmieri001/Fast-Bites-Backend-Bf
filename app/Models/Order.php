<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    //Relazione many to many (Order -> Food)
    public function orders()
    {
        return $this->belongsToMany(Food::class);
    }
}
