<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopifyController;




//--------------pages-------------
Route::get('/',[ShopifyController::class,'homePage'])
      ->middleware(['verify.shopify'])
      ->name('home');
      
Route::get('/about',[ShopifyController::class,'aboutPage'])
      ->middleware(['verify.shopify'])
      ->name('about');  

Route::get('/pricing',[ShopifyController::class,'pricingPage'])
      ->middleware(['verify.shopify'])
      ->name('pricing');  

// -------------groups------------
Route::get('/groups',[ShopifyController::class,'getGroups'])
      ->middleware(['verify.shopify'])
      ->name('groups'); 

Route::post('/groups', [ShopifyController::class, 'groupStore'])
      ->middleware(['verify.shopify'])
      ->name('group.save');      


// --------------products---------
Route::get('/products',[ShopifyController::class,'getProducts'])
      ->middleware(['verify.shopify'])
      ->name('products');
