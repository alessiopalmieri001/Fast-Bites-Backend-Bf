<?php

namespace App\Http\Controllers\Customer;

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
        $foods = Food::all();
        return view('customer.foods.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFoodRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        return view('customer.foods.show', compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $food)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFoodRequest $request, Food $food)
    {
       //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {

    }
}
