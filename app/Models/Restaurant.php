<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    //Creata relazione 1 (User) to many (Restaurant)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
