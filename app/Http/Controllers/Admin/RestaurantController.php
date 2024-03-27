<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Http\Controllers\Controller;

// Models
use App\Models\Restaurant;

// Form Request
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

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
        //definisco una variabile che mi esegue una query(select * from restaurants ) cosi che mi prenda tutti di dati della tabella
        $restaurants = Restaurant::all();
        
        
        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
        $restaurantData = $request->validated();
        $slug = Str::slug($restaurantData['name']);

        $img = null;
        if (isset($restaurantData['img'])) {
            $img = Storage::disk('public')->put('images', $restaurantData['img']);
        }

        $restaurant = Restaurant::create([
            'name' => $restaurantData['name'],
            'slug' => $slug,
            'iva' => $restaurantData['iva'],
            'img' => $restaurantData['img'],
        ]);

        return redirect()->route('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        return view('admin.restaurants.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $restaurantData = $request->validated();

        $slug = Str::slug($restaurantData['title']);

        $restaurant->update([
            'title' => $restaurantData['title'],
            'slug' => $slug,
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
