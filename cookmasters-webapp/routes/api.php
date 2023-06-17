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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/**
 * Auth Routes
 */
Route::post('/login', 'App\Http\Controllers\API\AuthController@login')->name('login');

/**
 * Protected Routes
 */

Route::group(['middleware' => 'auth.api'], function () {
    /**
     * Logout
     */
    Route::post('/logout', 'App\Http\Controllers\API\AuthController@logout')->name('logout');

    /**
     * Get user account informations
     */
    Route::post('/account', 'App\Http\Controllers\API\AuthController@account')->name('account');

    /**
     * get users list
     */
    Route::get('/users', 'App\Http\Controllers\API\UsersController@index')->name('users.index');    
});
