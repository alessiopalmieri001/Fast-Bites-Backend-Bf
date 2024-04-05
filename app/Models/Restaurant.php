<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'address',
        'iva',
        'img',
        'category_id',
    ];
      use SoftDeletes;

    //Creata relazione 1 (User) to many (Restaurant)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Creata relazione 1 (Restaurant) to many (Food)
    public function foods()
    {
        return $this->hasMany(Food::class);
    }

    //Relazione many to many (Restaurant -> Category)
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    //Relazione 1 to many (Restaurant -> Order)
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
