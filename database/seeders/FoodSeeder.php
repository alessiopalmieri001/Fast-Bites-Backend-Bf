<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Helpers
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as FakerFactory;

//Models
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

        for($i = 0 ; $i < 10; $i++){
            $singleFood = new Food();
            $restaurant = Restaurant::inRandomOrder()->first();
            $singleFood->restaurant_id = $restaurant->id;
            $singleFood->name = $faker->foodName();
            $singleFood->description = $faker->paragraph();
            $singleFood->price = $faker->randomDigit();
            $singleFood->availability = $faker->boolean();
            $singleFood->img = $faker->imageUrl($width = 200, $height = 200);
            $singleFood->save();
        }
    }
};