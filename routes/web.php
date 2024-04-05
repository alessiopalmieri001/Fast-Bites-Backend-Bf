<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\MainController as AdminMainController;
use App\Http\Controllers\Admin\RestaurantController as AdminRestaurantController;
use App\Http\Controllers\Admin\FoodController as AdminFoodController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\RestaurantController;

use App\Http\Controllers\Customer\CategoryController as CustomerCategoryController;
use App\Http\Controllers\Customer\RestaurantController as CustomerRestaurantController;
use App\Http\Controllers\Customer\FoodController as CustomerFoodController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('home');


Route::prefix('customer')
    ->name('customer.')
    ->group(function (){
        Route::resource('categories', CustomerCategoryController::class);
        Route::resource('restaurants', CustomerRestaurantController::class);
        Route::resource('foods', CustomerFoodController::class);
    });



/* rotte protette */
Route::middleware(['auth','check.restaurant'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminMainController::class, 'dashboard'])->name('dashboard');

        Route::resource('restaurants',AdminRestaurantController::class);
        Route::middleware('check.restaurant')->group(function () {
            // Definisci qui le tue rotte per la creazione del piatto
            Route::resource('foods',AdminFoodController::class);

        });
        Route::resource('orders',AdminOrderController::class);
        Route::resource('categories',AdminCategoryController::class);

    });



require __DIR__.'/auth.php';

