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
    
        // Upload dell'immagine
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
        } else {
            $imageName = null; // immagine di default
        }
    
        $food = Food::create([
            'restaurant_id' => $user->restaurants->id,
            'name' => $foodData['name'],
            'description' => $foodData['description'],
            'price' => $foodData['price'],
            'availability' => $foodData['availability'],
            'img' => 'images/' . $imageName, 
        ]);
    
        return redirect()->route('admin.foods.show', $food->id);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = auth()->user();
        $food = Food::find($id);

        // Controllo se il piatto esiste oppure se l'utente ha il permesso di vedere il piatto
        if (!$food || $food->restaurant->user_id != $user->id) {
            abort(403, 'Non sei autorizzato a vedere questo cibo.');
        }

        return view('admin.foods.show', compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = auth()->user(); //Per l'utente loggato
        $food = Food::find($id);    //Prendo la colonna id dei foods
        // Controllo se il piatto esiste oppure se l'utente ha il permesso di editare il piatto
        if (!$food || $food->restaurant->user_id != $user->id) {
            abort(403, 'Non sei autorizzato a modificare questo cibo.');
        }
        return view('admin.foods.edit', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFoodRequest $request, Food $food)
    {
        $foodData = $request->validated();
        $user = auth()->user();
    
        // Upload dell'immagini
        if ($request->hasFile('img')) {
            // Update dell'immagine
            $image = $request->file('img');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
    
            $food->img = 'images/' . $imageName;
        }
    
        $food->update([
            'restaurant_id' => $user->restaurants->id,
            'name' => $foodData['name'],
            'description' => $foodData['description'],
            'price' => $foodData['price'],
            'availability' => $foodData['availability'],
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
