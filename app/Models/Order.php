<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//model
use App\Models\Food;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'total',
        'status',
        'name',
        'surname',
        'email',
        'address',
        'phone_num',
        'status',
        'total'
    ];

    //Relazione many to many (Order -> Food)
    public function foods()
    {
        return $this->belongsToMany(Food::class)->withPivot('quantity')->withTrashed();
    }

    //Relazione 1 to many (Order -> Restaurant)
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    //Relazione many to many (Order -> Food)
    public function foods()
    {
        return $this->belongsToMany(Food::class)->withPivot('quantity')->withTrashed();
    }


}
