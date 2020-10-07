<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/login', 'AuthController@login');
Route::post('/register','AuthController@register');
Route::resource('categories', 'CategoryController');
Route::resource('products', 'ProductController');
Route::resource('orders', 'OrderController');

<<<<<<< HEAD
Route::post('/customers/{user}/carts','CartController@store');
Route::post('/customers/{user}/carts','CartController@getCustomerCart');
=======
Route::get('/customers/{user}/carts','CartController@getCustomerCart');
Route::post('/customers/{user}/carts','CartController@storeOrUpdate');
Route::delete('/customers/{user}/carts/products/{id}','CartController@destroy');
>>>>>>> ad6a9231d2fe7e9bbbb51758e3625f0f0d6cf79a


