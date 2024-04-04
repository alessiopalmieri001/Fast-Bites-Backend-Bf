<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'address',
        'phone_num',
        'status',
        'total'
    ];

    //Relazione many to many (Order -> Food)
    public function foods()
    {
        return $this->belongsToMany(Food::class)->withPivot('quantity');
    }

    //Relazione 1 to many (Order -> Restaurant)
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

}
