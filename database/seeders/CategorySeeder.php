<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //array di tutte le categorie
        $allcategories = [
            [
                'name'=> 'Pizza',//1
                'img' => ' https://italpizza.com/wp-content/uploads/2023/03/5.-Storia-della-pizza-Margherita.png'
            ],
            [
                'name'=> 'Cinese',
                'img' => 'https://assets.tmecosys.com/image/upload/t_web767x639/img/recipe/ras/Assets/17eefccc0612317aa9f2ce1fbaae56cc/Derivates/3740e0c14b97c50890905a1961b9eb542959cc06.jpg'
            ],
            [
                'name'=> 'Giapponese',
                'img' => 'https://img.freepik.com/premium-photo/hand-pressed-sushi-nigiri-is-classic-japanese-dish-featuring-fresh-fish-top-sushi-rice_998533-128.jpg'
            ],
            [
                'name'=> 'Hamburger',//4
                'img' => 'https://product.hstatic.net/200000291375/product/item_01_06ee15b90f6d41198cb71e8c7df2f235_master.jpg'
            ],
            [
                'name'=> 'Pasticceria',
                'img' => 'https://static.cosaporto.it/media/2021/08/Maritozzo-singolo.jpg'
            ],
            [
                'name'=> 'Pasta',
                'img' => 'https://assets.tmecosys.com/image/upload/t_web767x639/img/recipe/ras/Assets/69EE02DA-213D-44A2-8B08-A590225B221B/Derivates/ddaaebc0-028c-4c3c-b409-281d03dcfe19.jpg'
            ],
            [
                'name'=> 'Messicano',
                'img' => 'https://www.melarossa.it/wp-content/uploads/2020/12/tacos.jpg'
            ],
            [
                'name'=> 'Piadineria',
                'img' => 'https://www.lapiadineria.com/assets/img/console/mo/products/638_image_it.png?v=1693997981'
            ],

        ];
//ciclo foreach per ciclare tutte le categorie
        foreach ($allcategories as $singlecategory) {
            $category = new Category();
            $category->name = $singlecategory['name'];
            $category->img = $singlecategory['img'];
            $category->save();
        }
    }
}