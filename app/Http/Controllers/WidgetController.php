<?php

namespace App\Http\Controllers;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class WidgetController extends Controller
{
    public function showGeneralFaqWidget()
    {
        $shop = User::where('name', \request()->get('shop'))->firstOrFail();

        $setting = $shop->settings;

        $groups = Group::where('shop_id', $shop->id)            
            ->get();

        return view('storefront.general-widget', compact('groups'));
    }
}
