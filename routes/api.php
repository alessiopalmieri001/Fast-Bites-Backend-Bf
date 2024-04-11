<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Controllers
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\EndpointController;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\Api\OrderController;


use App\Http\Controllers\Auth\BraintreeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::name('api.')->group(function (){

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });


   //Category Routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

    //Restaurants Routes
    Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurant.index');
    Route::get('/restaurants/{id}', [RestaurantController::class, 'show'])->name('restaurant.show');

    //Foods Routes
    Route::get('/foods', [FoodController::class, 'index'])->name('food.index');
    Route::get('/foods/{id}', [FoodController::class, 'show'])->name('food.show');

    //Order Routes
    Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('order.show');

    Route::post('/orders', [OrderController::class, "store"]);
    Route::post('/orders/{id}', [OrderController::class, "update"]);

    // Rotte per Braintree
    /*  Route::get('/braintree/client-token', [BraintreeController::class, 'generateClientToken']);
    Route::post('/braintree/process-payment', [BraintreeController::class, 'processPayment']); */

    Route::post('/endpoint', [EndpointController::class, 'store']);

});


