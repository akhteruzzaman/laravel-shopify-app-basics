<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopifyController extends Controller
{
    function getDetails(){
        return response("Hi There", 200);
    }

    function shopDetails(Request $request){
        $shop = $request->user();
        $shop = $shop->api()->rest('GET','/admin/shop.json');
        echo "<pre>";
        print_r($shop['body']['shop']['name']);
    }

    function getProducts(Request $request){
         $shop = $request->user();
         $products = $shop->api()->rest('GET','/admin/api/2023-10/products.json');
       
         //return view('welcome', ['products' => $products['body']['products']]);
         dd($products);
    }

   
   


}
