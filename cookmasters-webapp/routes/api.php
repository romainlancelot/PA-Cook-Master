<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::group(['namespace' => 'App\Http\Controllers\API'], function()
{
    /**
     * Twilio Access Token
     */
    Route::get('/twilio/access_token', 'TwilioAccessTokenController@generate_token');

    /**
     * Auth Routes
     */
    Route::post('/login', 'AuthController@login');

    /**
     * Protected Routes
     */

     Route::group(['middleware' => ['auth.api']], function () {
        /**
         * Logout
         */
        Route::post('/logout', 'AuthController@logout');

        /**
         * Get user account informations
         */
        Route::post('/account', 'AuthController@account');
     });

    Route::group(['middleware' => ['auth.api', 'admin.api']], function () {
        /**
         * get users list
         */
        Route::get('/users', 'UsersController@index');

        /**
         * get cooking recipes list
         */
        Route::get('/cooking-recipes', 'CookingRecipesController@getCookingRecipes');
    });
});
