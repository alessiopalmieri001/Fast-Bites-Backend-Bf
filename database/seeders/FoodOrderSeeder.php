<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Models
use App\Models\Food;
use App\Models\Order;


class FoodOrderSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $relations = [
                [
                    "food" => 1, 
                    "order" => 1,
                    "quantity" => 3,
                ],
                [
                    "food" => 2, 
                    "order" => 1,
                    "quantity" => 1,
                ],
                [
                    "food" => 5, 
                    "order" => 1,
                    "quantity" => 1,
                ],
                [
                    "food" => 2, 
                    "order" => 2,
                    "quantity" => 1,
                ],
                [
                    "food" => 5, 
                    "order" => 3,
                    "quantity" => 1,
                ],
                [
                    "food" => 7, 
                    "order" => 4,
                    "quantity" => 4,
                ],
                [
                    "food" => 1, 
                    "order" => 5,
                    "quantity" => 3,
                ],
                [
                    "food" => 5, 
                    "order" => 6,
                    "quantity" => 2,
                ],
                [
                    "food" => 2, 
                    "order" => 7,
                    "quantity" => 1,
                ],
                [
                    "food" => 6, 
                    "order" => 8,
                    "quantity" => 4,
                ],
                [
                    "food" => 1, 
                    "order" => 9,
                    "quantity" =>5,
                ],
                [
                    "food" => 8, 
                    "order" => 10,
                    "quantity" => 2,
                ],
            ];
            
            foreach ($relations as $relation) {
                $food = Food::find($relation['food']);
                $order = Order::find($relation['order']);
                $food->orders()->attach($order, ['quantity' => $relation['quantity']]);
            }
    }
}


/* 
1 Scelgo il ristorante
2 Scelgo il primo piatto
3 Scelgo il secondo piatto
4 SE secondo piatto è dello stesso ristorante del primo
    ALLORA continua
    ALTRIMENTI alert che devi selezionare solo da quel ristorante

*/