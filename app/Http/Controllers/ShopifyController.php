<?php

namespace App\Http\Controllers;
use App\Models\Group;
use Illuminate\Http\Request;
require_once app_path('Helpers/shopify.php');

class ShopifyController extends Controller
{
    function homePage(){
        return view('pages.home');
    }

    function aboutPage(){
        return view('pages.about');
    }

    function pricingPage(){
        return view('pages.pricing');
    }
    
    function getProducts(Request $request){
        $shop = $request->user();
        $products = $shop->api()->rest('GET','/admin/api/2023-10/products.json');
       
        return view('products.products', ['products' => $products['body']['products']]);
        //dd($products);
    }

    function getGroups(){
        $groups = Group::where('shop_id', auth()->user()->id)->get();
        return view('groups.groups', compact('groups'));
    }

    public function groupStore(Request $request)
    {
        $groupid = $request->groupid;
        if ($groupid != 0) {
            $group = Group::find($groupid);
        } else {
            $group = new Group();
        }

        $group->name = $request->name;
        $group->description = $request->description;
        $group->shop_id = auth()->user()->id;
        $group->status = 1;

        $group->save();

        $redirectUrl = getRedirectRoute('groups');
        return redirect($redirectUrl);
    }

   
   


}
