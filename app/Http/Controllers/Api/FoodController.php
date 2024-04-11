<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

// Model
use App\Models\Food;
use App\Models\Order;


class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::all();

        return response()->json([
            'success' => true,
            'payload' => $foods
        ]);
    }

    public function show($id)
    {
        try {
            // Trova il cibo con l'ID fornito, includendo le relazioni con il ristorante e gli ordini
            $food = Food::findOrFail($id);

            return response()->json([
                'success' => true,
                'payload' => $food // Utilizza $food invece di $foods
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Piatto non trovato'
            ], 404);
        }
    }
}
