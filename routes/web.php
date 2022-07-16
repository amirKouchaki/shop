<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\MasterFactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group([
    'middleware' => 'can:is_admin',
    'prefix' => 'admins',
    'as' => 'admins.'
], function () {
    Route::get('dashboard',[AdminProductController::class,'index'])->name('dashboard');
    Route::get('products/create',[AdminProductController::class,'create'])->name('products.create');
    Route::post('products',[AdminProductController::class,'store'])->name('products.store');
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register.create');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');
    Route::get('/employees',[RegisteredUserController::class,'index'])->name('employees.index');

});

Route::group([
    'middleware' => 'can:is_employee',
    'prefix' => 'employees',
    'as' => 'employees.'
], function () {
    Route::get('dashboard',[UserProductController::class,'index'])->name('dashboard');
    Route::get('products/{product:slug}/orders/create',[OrderController::class,'create'])->name('orders.create');
    Route::post('orders',[OrderController::class,'store'])->name('orders.store');
    Route::get('orders',[OrderController::class,'index'])->name('orders.index');
    Route::delete('orders/{product_id}',[OrderController::class,'destroy'])->name('orders.destroy');
    Route::post('masterFacts',[MasterFactController::class,'store'])->name('masterFacts.store');
    Route::get('factors',[MasterFactController::class,'index'])->name('masterFacts.index');
});
require __DIR__ . '/auth.php';
