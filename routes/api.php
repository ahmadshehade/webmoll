<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//
Route::post('register','ApI\RegisterLoginController@register');
Route::post('login','ApI\RegisterLoginController@login');
Route::middleware('auth:api')->group(function(){

    Route::resource('product','API\ProductController');
    Route::get('/products/trash','API\ProductController@trash');
    Route::delete('/products/{id}/hdelete', 'API\ProductController@hdelete');
    Route::patch('/products/{id}/restore', 'API\ProductController@restore');
    Route::get('/products/{id}/addToBasket', 'API\ProductController@addToBasket');

    ////
    Route::resource('basket','API\BasketController');
    Route::get('baskets/trash','API\BasketController@trash');
    Route::delete('basket/hdelete/{id}','API\BasketController@hdelete');
    Route::patch('basket/restore/{id}','API\BasketController@restore');
//
Route::delete('productsbasket/destroy/{id}','API\ProductsBasketsController@destroy');
//
Route::resource('profile','API\ProfileController');
});
