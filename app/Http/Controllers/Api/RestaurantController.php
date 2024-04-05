<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

//Model
use App\Models\Restaurant;


class RestaurantController extends Controller
{
    public function index()
    {
        $restaurant = Restaurant::with(['categories', 'foods'])->paginate(2);
        return response()->json([
            'success' => true,
            'payload' => $restaurant,
        ]);
    }

    public function show($id)
    {
        try {
            $restaurant = Restaurant::with([ 'categories', 'foods'])->findOrFail($id);

            return response()->json([
                'success' => true,
                'payload' => $restaurant
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ristorante non trovato'
            ], 404);
        }
    }
}
