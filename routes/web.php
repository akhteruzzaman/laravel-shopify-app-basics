<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopifyController;
use App\Http\Controllers\WidgetController;

Route::group(['middleware' => ['verify.shopify']], function () {

//--------------pages-------------
Route::get('/',[ShopifyController::class,'homePage'])
      ->name('home');
      
Route::get('/about',[ShopifyController::class,'aboutPage'])
      ->name('about');  

Route::get('/pricing',[ShopifyController::class,'pricingPage'])
      ->name('pricing');  

// -------------groups------------
Route::get('/groups',[ShopifyController::class,'getGroups'])
      ->name('groups'); 

Route::post('/groups', [ShopifyController::class, 'groupStore'])
      ->name('group.save');

// --------------products---------
Route::get('/products',[ShopifyController::class,'getProducts'])    
      ->name('products');

});


Route::get('/storefront/widgets/general-group',[WidgetController::class, 'showGeneralFaqWidget'])
    ->name('widget.general-group');