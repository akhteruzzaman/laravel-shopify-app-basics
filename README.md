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










