<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//model
use App\Models\User;

//helper
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Inizializzo la variabile per recuperare i dati dalla cartella config/restaurants.php
        $userData = config('users');

        foreach ($userData as $singleUser) {

            $user = new User();
            $user->name = $singleUser['name'];
            $user->email = $singleUser['email'];
            $user->password = Hash::make($singleUser['password']);
            $user->save();
        }
    }
}
