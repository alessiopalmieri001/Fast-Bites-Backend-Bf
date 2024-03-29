<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

// Models
use App\Models\Restaurant;

// Request
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;

// Helper
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Definisco una variabile che mi esegue una query(select * from restaurants ) così che mi prenda tutti i dati della tabella
        $restaurants = Restaurant::all();
        
        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
        $restaurantData = $request->validated();
        $slug = Str::slug($restaurantData['name']);

        $restaurant = Restaurant::create([
            'name' => $restaurantData['name'],
            'slug' => $slug,
            'address' => $restaurantData['address'],
            'iva' => $restaurantData['iva'],
            'img' => $restaurantData['img'],
        ]);

        return redirect()->route('admin.restaurants.show', $restaurant);
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        // Ottieni tutti i cibi associati a questo ristorante
        $foods = $restaurant->foods; // Assuming there is a relationship defined between Restaurant and Food models

        return view('admin.restaurants.show', compact('restaurant', 'foods')); // Cambia $food in $foods
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        return view('admin.restaurants.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $restaurantData = $request->validated();

        $slug = Str::slug($restaurantData['name']);

        $restaurant->update([
            'name' => $restaurantData['name'],
            'slug' => $slug,
            'address' => $restaurantData['address'],
            'iva' => $restaurantData['iva'],
            'img' => $restaurantData['img'],
        ]);

        return redirect()->route('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        return redirect()->route('admin.restaurants.index');
    }
}