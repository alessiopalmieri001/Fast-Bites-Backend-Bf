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
                    "restaurant" => 10,      //TAKUMI
                    "category" => 3
                ],
                [
                    "restaurant" => 11,      //GINMI
                    "category" => 2
                ],
            ];

            foreach ($relations as $relation) {
                $restaurant = Restaurant::find($relation['restaurant']);
                $category = Category::find($relation['category']);
                $restaurant->categories()->attach($category);
            }
    }
}
