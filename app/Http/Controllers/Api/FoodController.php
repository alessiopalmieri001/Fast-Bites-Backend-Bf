<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

//Model
use App\Models\Food;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::with(['restaurant', 'orders'])->paginate(2);

        return response()->json([
            'success' => true,
            'payload' => $foods
        ]);
    }
    public function show($id)
    {
        try {
            $foods = Food::with(['restaurant', 'orders'])->findOrFail($id);

            return response()->json([
                'success' => true,
                'payload' => $foods
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Piatto non trovato'
            ], 404);
        }
    }
}
