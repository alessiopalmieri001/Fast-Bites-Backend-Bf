<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//Models
use App\Models\Restaurant;
use App\Models\User;

//Helpers
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as FakerFactory;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Cancella tutti i record nella tabella prima di inserire nuovi dati
        Schema::disableForeignKeyConstraints();
        Restaurant::truncate();
        Schema::enableForeignKeyConstraints();

        // Inizializza l'istanza di Faker
        $faker = FakerFactory::create();

        //Inizializzo la variabile per recuperare i dati dalla cartella config/restaurants.php
        $restaurantData = config('restaurants');

        // Eseguo un ciclo nel file restaurants.php 
        foreach ($restaurantData as $singleRestaurant) {

            $restaurant = new Restaurant();
            $user = User::inRandomOrder()->first();
            //$restaurant->user_id = $user->id;
            $restaurant->name = $singleRestaurant['name'];
            $restaurant->slug = Str::slug($singleRestaurant['name']);
            $restaurant->address = $singleRestaurant['address'];
            // Utilizza numberBetween per generare un numero di partita IVA casuale
            $restaurant->iva = $faker->numberBetween(10000000000, 99999999999);
            $restaurant->img = $singleRestaurant['img'];
            $restaurant->save();
        }
    }
}
