<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class MainController extends Controller
{

    public function dashboard()
    {
        $user = auth()->user();
        $restaurant = $user->restaurants;

        

        $orders = Order::with(['restaurant', 'foods'])
            ->whereHas('restaurant', function ($query) use ($restaurant) {
                // Controlla se $restaurant è null prima di accedere alla sua proprietà 'id'
                if ($restaurant) {
                    $query->where('id', $restaurant->id);
                }
            })
            ->get();

        

        return view('admin.dashboard', compact('user', 'orders', 'restaurant'));
    }

}
