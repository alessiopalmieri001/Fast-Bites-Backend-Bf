<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
