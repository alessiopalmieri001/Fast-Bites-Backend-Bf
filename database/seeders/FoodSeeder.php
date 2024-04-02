<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Helpers
use Illuminate\Support\Facades\Schema;
use Faker\Factory as FakerFactory;

// Models
use App\Models\Food;
use App\Models\Restaurant;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cancella tutti i record nella tabella prima di inserire nuovi dati
        Schema::disableForeignKeyConstraints();
        Food::truncate();
        Schema::enableForeignKeyConstraints();

        // Inizializza l'istanza di Faker
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \FakerRestaurant\Provider\it_IT\Restaurant($faker));

        //Richiamo la lista di cibi
        $foods = config('foods');

        foreach ($foods as $food) {
            $singleFood = new Food();
            $singleFood->restaurant_id = $food['restaurant_id'];
            $singleFood->name = $food['name'];
            $singleFood->description = $food['description'];
            $singleFood->price = $food['price'];
            $singleFood->availability = $food['availability'];
            $singleFood->img = $food['img'];
            $singleFood->save();
        }
    }
}