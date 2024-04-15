<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Models
use App\Models\Restaurant;
use App\Models\Category;


class RestaurantCategorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $relations = [
                [
                    "restaurant" => 1, // DA ALESSIO
                    "category" => 1
                ],
                [
                    "restaurant" => 1,
                    "category" => 4
                ],
                [
                    "restaurant" => 1,
                    "category" => 5
                ],
                [
                    "restaurant" => 2,      //PIZZA E CORE
                    "category" => 1
                ],
                [
                    "restaurant" => 2,
                    "category" => 5
                ],
                [
                    "restaurant" => 3,      // ROMAGNA MIA
                    "category" => 8
                ],
                [
                    "restaurant" => 4,      //MC DONALD
                    "category" => 4
                ],
                [
                    "restaurant" => 5,      //BAKERY AND DREAM
                    "category" => 5
                ],
                [
                    "restaurant" => 6,      //PIZZIUM
                    "category" => 1
                ],
                [
                    "restaurant" => 6,
                    "category" => 6
                ],
                [
                    "restaurant" => 7,      //BENTOTECA
                    "category" => 4
                ],
                [
                    "restaurant" => 8,      //PASTICCERIA DA GELSOMINA
                    "category" => 5
                ],
                [
                    "restaurant" => 9,      //BURGER KING
                    "category" => 4
                ],
                [
                    "restaurant" => 9,      
                    "category" => 8
                ],
                [
                    "restaurant" => 10,      //TAKUMI
                    "category" => 3
                ],
                [
                    "restaurant" => 11,      //GINMI
                    "category" => 2
                ],
                [
                    "restaurant" => 12,      //LIEVITA'
                    "category" => 1
                ],
                [
                    "restaurant" => 12,    
                    "category" => 6
                ],
                [
                    "restaurant" => 13,      //ISHI FUSION
                    "category" => 3
                ],
                [
                    "restaurant" => 14,      //FIVE GUYS
                    "category" => 4
                ],
                [
                    "restaurant" => 14,      //FIVE GUYS
                    "category" => 8
                ],
                [
                    "restaurant" => 15,      //PAN
                    "category" => 7
                ],
                [
                    "restaurant" => 15,      
                    "category" => 1
                ],
                [
                    "restaurant" => 16,      
                    "category" => 1
                ],
                [
                    "restaurant" => 16,      
                    "category" => 4
                ],
            ];

            foreach ($relations as $relation) {
                $restaurant = Restaurant::find($relation['restaurant']);
                $category = Category::find($relation['category']);
                $restaurant->categories()->attach($category);
            }
    }
}
