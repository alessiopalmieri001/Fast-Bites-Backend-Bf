<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//HELPERS
use Faker\Factory as FakerFactory;
use Faker\Generator as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = [
            'In preparazione',
            'In transito',
            'Consegnato',
        ];
        // Inizializza l'istanza di Faker
        $faker = FakerFactory::create();


        for ($i = 0; $i < 100; $i++) {
            $randomStatusIndex = array_rand($status);
            $order = new Order();
            $order->restaurant_id = $faker->randomElement($this->getRestaurantId()); //Inserisco gli id dei ristoranti casualmente
            $order->name = $faker->name;
            $order->email = $faker->email;
            $order->address = $faker->address;
            $order->phone_num = $faker->e164PhoneNumber;
            //$order->total = $faker->randomNumber(3);
            $order->status = $status[$randomStatusIndex];
            $order->created_at = $faker->dateTimeBetween('-5 months', 'now');
            $order->save();
        }
    }

    //Definisco una funzione per recuperare la colonna id di tutti i ristoranti
    private function getRestaurantId() {
        return Restaurant::all()->pluck('id');
    }
}
