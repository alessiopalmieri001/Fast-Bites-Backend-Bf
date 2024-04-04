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
        'name',
        'surname',
        'email',
        'phone_num',
        'address',
        'total',
        'status',
    ];


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
