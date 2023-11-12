Installation
Shopify
Step 1: Create an account at Shopify Dev.

Step 2: Create a new App.

Note: Create the app manually.
Step 3: Save the client credentials for future use.

Laravel
Step 4: Install Laravel in localhost.

bash
Copy code
composer create-project laravel/laravel example-app
Step 5: Install Kyon Laravel Shopify package. Installation guide

bash
Copy code
composer require kyon147/laravel-shopify
Step 6: Use this command to install the package.

bash
Copy code
php artisan vendor:publish --tag=shopify-config
Step 7: Access the config file here config/shopify-app.php.

Note: Find the API key variables here.
Step 8: Copy the variable name and paste it in the .env file. Also, copy and paste Shopify app client credentials.

Step 9: Setup callback URL on the Shopify App setup.

Ngrok
Download Ngrok on your PC and open it. Then use the following command to add the auth token.

bash
Copy code
ngrok authtoken YOUR_AUTH_TOKEN
After installing Ngrok, use this command.

bash
Copy code
ngrok http 8000
Step 11: In routes/web.php file, use this code.

php
Copy code
Route::get('/', function () {
    return view('welcome');
})->middleware(['verify.shopify'])->name('home');
Step 12: Modify Laravel app/Models/User.php file.

First, add these 2 lines to the class.

php
Copy code
use Osiset\ShopifyApp\Contracts\ShopModel as IShopModel;
use Osiset\ShopifyApp\Traits\ShopModel;
Next, modify the class line to become.

php
Copy code
class User extends Authenticatable implements IShopModel
Finally, inside the class, add.

php
Copy code
use ShopModel;
This is an example of the complete code.
