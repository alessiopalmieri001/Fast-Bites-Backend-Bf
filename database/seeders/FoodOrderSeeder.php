<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


//Models
use App\Models\Food;
use App\Models\Order;
use App\Models\Restaurant;


class FoodOrderSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $orders = Order::all();

        foreach ($orders as $order) {
            $menu = Restaurant::with('foods')->find(Order::find($order->id)->restaurant->id)->foods;

            $orderedFoodsCount = rand(1, 10);
            $total = 0;
            for ($i = 0; $i < $orderedFoodsCount; $i++) {
                if ($menu->isEmpty()) {
                    continue; // Esci dall'iterazione se il menu è vuoto
                }
                $foodId = $menu->random()->id;
                $quantity = rand(1, 5);
                if (DB::table('food_order')->where('food_id', $foodId)->where('order_id', $order->id)->exists()) {
                    continue;
                } else {
                    $total += ($menu->find($foodId)->price * $quantity);
                    DB::table('food_order')->insert([
                        'food_id' => $foodId,
                        'order_id' => $order->id,
                        'quantity' => $quantity,
                    ]);
                }
            }
            $order->update(['total' => $total]);
        }
    }
}


