# Installation

## Shopify

#### Step 1: Create an account at [Shopify Dev](https://www.shopify.com/login).

#### Step 2: Create a new App.

   - *Note:* Create the app manually.

#### Step 3: Save the client credentials for future use.

## Laravel

#### Step 4: Install Laravel in localhost.


``` composer create-project laravel/laravel example-app ```


#### Step 5: Install Kyon Laravel Shopify Package

- Link: [Kyon Laravel Shopify Package](https://github.com/Kyon147/laravel-shopify)

## Installation Guide

- [Installation Guide](https://github.com/Kyon147/laravel-shopify/wiki/Installation)

#### Step 6: Install the Package

``` composer require kyon147/laravel-shopify ```

#### Step 7: Then use this command 
``` php artisan vendor:publish --tag=shopify-config ```

#### Step 8: Now access the config file here 
``` config/shopify-app.php ```
You will find the api key variables here. 

#### Step 9: Copy the variable name.  And paste it on .env file 
Also copy and paste shopify app client credentials

#### Step 10:  Setup callback url on shopify App setup

## Ngrok
Download ngrok on your pc and open
Then use this command for add authtoken
after install ngrok use this command

``` ngrok http 8000 ```

#### Step 11: In routes/web.php file use this code 
```
Route::get('/', function () {
    return view('welcome');
})->middleware(['verify.shopify'])->name('home');
```

#### Step 12 : Modify laravel  app/Models/User.php file

First add these 2 line on the class 

```
use Osiset\ShopifyApp\Contracts\ShopModel as IShopModel;
use Osiset\ShopifyApp\Traits\ShopModel;
```

Next, modify the class line to become

```
class User extends Authenticatable implements IShopModel
```

Next, inside the class, add:

```
use ShopModel;
```




# Shopify API 

## Product API 

#### Step 1: Call shopify Product API in Controller
```
function getProducts(Request $request){
    $shop = $request->user();
    $products = $shop->api()->rest('GET','/admin/api/2023-10/products.json');       
    return view('products.products', ['products' => $products['body']['products']]);
    //dd($products);
}
```

#### Step 2: Use foreach loop for show Products on View file
```
 @foreach ($products as $product)
    <tr>
        <td>
            {{ $product['id'] }}
        </td>
        <td>
            {{ $product['title'] }}
        </td>
    </tr>
@endforeach
```



# Shopify Route

## web.php
```
Route::group(['middleware' => ['verify.shopify']], function () {
    Route::get('/',[ShopifyController::class,'homePage'])->name('home');
}); 
```
## shopify token route

In shopify we need to use this tokenRoute for any type of routing inside shopify app
``` 
<a href="{{ URL::tokenRoute('groups')}}" > Groups </a>
```



# Work with database

## Migration 

#### Step 1: Write migrations for 'group' table. 

```
php artisan make:migration create_group_table
```

Here is group table migration code. 
```
Schema::create('groups', function (Blueprint $table) {
    $table->id();
    $table->string( column: 'name', length: 100 )->index();           
    $table->text( column: 'description')->nullable();
    $table->string( column: 'shop_id');
    $table->boolean( column: 'status')->default( value:true);
    $table->timestamps();
});
```

Finally we have to migrate the code to create this table with columns for this database. 
```
php artisan migrate
```

## Insert data

Here is controller code for insert "group" data into database. 

```
// Controller
public function groupStore(Request $request)
{
    $groupid = $request->groupid; 
    $group->name = $request->name;
    $group->description = $request->description;
    $group->shop_id = auth()->user()->id;
    $group->status = 1;

    $group->save();

    $redirectUrl = getRedirectRoute('groups');
    return redirect($redirectUrl);
}

// View
<div class="flex-1 mt-12 sm:max-w-lg lg:max-w-md">
    <form method="POST" action="" class="space-y-5">
        @sessionToken
        <input type="hidden" name="host" value="{{getHost()}}">
        <input type="hidden" name="groupid" id="groupid" value="0">
        <div>
            <label class="font-medium"> Group Name</label>
            <input type="text" id="name" name="name" required
                class="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-yellow-600 shadow-sm rounded-lg" />
        </div>
        <div>
            <label class="font-medium"> Description </label>
            <textarea rows="3" id="description" name="description"
                class="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-yellow-600 shadow-sm rounded-lg"></textarea>
        </div>
        <button type="submit"
            class="w-full px-4 py-2 text-white font-medium bg-yellow-600 hover:bg-yellow-500 active:bg-yellow-600 rounded-lg duration-150">
            Save Group
        </button>
    </form>
</div>    
```
#### Important Note 1: 

We need to create partial js code for insert data. 
This file located here. 
https://github.com/akhteruzzaman/laravel-shopify-app-basics/blob/master/resources/views/partials/scripts.blade.php

#### Important Note 2:
We use @sessionToken under the form tag. 
And getHost method in a hidden field.
<input type="hidden" name="host" value="{{getHost()}}">


## Show data
Here we use foreach loop to fetch data from database. 
```
@foreach ($groups as $group)
    <tr>
        <td">
            {{ $group->name }}
        </td>
        <td">
            {{ $group->description }}
        </td>       
    </tr>
@endforeach
```