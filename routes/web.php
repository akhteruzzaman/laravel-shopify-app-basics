<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopifyController;

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
})->middleware(['verify.shopify'])->name('home');

Route::get('hi',[ShopifyController::class,'getDetails'])->middleware(['verify.shopify'])->name('hi');
Route::get('shop-details',[ShopifyController::class,'shopDetails'])->middleware(['verify.shopify'])->name('shop-details');
Route::get('products',[ShopifyController::class,'getProducts'])->middleware(['verify.shopify'])->name('products');
