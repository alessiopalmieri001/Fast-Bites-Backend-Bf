<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

// Models
use App\Models\Restaurant;
use App\Models\Category;

// Request
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;

use Illuminate\Support\Facades\Auth;

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
        $user = auth()->user();

        $restaurant = $user->restaurants; // Otteniamo il ristorante associato all'utente

        return view('admin.restaurants.index', compact('user','restaurant'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.restaurants.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
        $restaurantData = $request->validated();
        $slug = Str::slug($restaurantData['name']);
        $user = auth()->user();

        $path = Storage::disk('public')->put('uploads/restaurants', $request['img']);
        $restaurantData['img'] = $path;

        // Upload dell'immagine
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
        } else {
            $imageName = null; // immagine di default
        }
          

        $restaurant = Restaurant::create([
            'user_id' => $user->id,
            'name' => $restaurantData['name'],
            'slug' => $slug,
            'address' => $restaurantData['address'],
            'iva' => $restaurantData['iva'],
            'img' => 'images/' . $imageName,
        ]);


         // Associare le categorie al ristorante
        $restaurant->categories()->sync($request->input('categories', []));


        return redirect()->route('admin.restaurants.index', $restaurant->id);
    }


    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        // Ottieni tutti i cibi associati a questo ristorante
        $foods = $restaurant->foods;

        return view('admin.restaurants.show', compact('restaurant', 'foods')); // Cambia $food in $foods
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Richiamo le categorie
        $categories = Category::all();
        $user = auth()->user(); //Per l'utente loggato
        $restaurant =Restaurant::find($id); //Prendo la colonna dei restaurant

        // Verifica se il ristorante esiste e se l'utente ha il permesso di modificarlo
        if (!$restaurant || $restaurant->user_id != $user->id){
            return view('errors.restaurants.errors_edit', compact("user", "restaurant"));
        }


        return view('admin.restaurants.edit', compact('restaurant','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $restaurantData = $request->validated();

        $slug = Str::slug($restaurantData['name']);

        if ($request->hasFile('img')) {
            // Elimina l'immagine precedente
            Storage::disk('public')->delete($restaurant->img);
            
            // Carica la nuova immagine
            $path = Storage::disk('public')->put('uploads/restaurants', $request->file('img'));
        
            // Aggiorna l'attributo 'img' con il percorso della nuova immagine
            $restaurantData['img'] = $path;
        } else {
            // Utilizza l'immagine corrente
            $restaurantData['img'] = $request->input('current_image');
        }

        $restaurant->update([
            'name' => $restaurantData['name'],
            'slug' => $slug,
            'address' => $restaurantData['address'],
            'iva' => $restaurantData['iva'],
            'img' => $restaurantData['img'],
        ]);

        // Sincronizza le categorie selezionate con il ristorante
        $restaurant->categories()->sync($request->input('categories', []));

        return redirect()->route('admin.restaurants.index', compact('restaurant'));
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
