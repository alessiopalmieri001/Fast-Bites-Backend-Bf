<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

// Models
use App\Models\Food;

// Request
use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;

// Helper
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$foods = Food::all();
        $user = auth()->user();

        return view('admin.foods.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.foods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFoodRequest $request)
    {
        $foodData = $request->validated();
        $user = auth()->user();

        $food = Food::create([
            'restaurant_id' => $user->restaurants->id,
            'name' => $foodData['name'],
            'description' => $foodData['description'],
            'price' => $foodData['price'],
            'availability' => $foodData['availability'],
            'img' => $foodData['img'],
        ]);

        return redirect()->route('admin.foods.show', $food->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        return view('admin.foods.show', compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $food)
    {
        return view('admin.foods.edit', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFoodRequest $request, Food $food)
    {
        $foodData = $request->validated();
        $user = auth()->user();

        $food->update([
            'restaurant_id' => $user->restaurants->id,
            'name' => $foodData['name'],
            'description' => $foodData['description'],
            'price' => $foodData['price'],
            'availability' => $foodData['availability'],
            'img' => $foodData['img'],
        ]);

        return redirect()->route('admin.foods.show', compact('food'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {
        $food->delete();

        return redirect()->route('admin.foods.index');
    }
}
