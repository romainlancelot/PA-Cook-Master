<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\RoomOfferController;
use App\Http\Controllers\ServiceController;
use App\Models\Equipment;
use App\Models\RoomOffer;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Language Routes
     */
    Route::get('lang/change', 'LangController@change')->name('changeLang');

    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    /**
     * Romes Routes
     */
    Route::resource('/rooms', RoomController::class);
    // put
    Route::get('/rooms/create', 'RoomController@create')->name('rooms.create');
    Route::post('/rooms', 'RoomController@store')->name('rooms.store');
    // delet
    Route::delete('/rooms/{room}', 'RoomController@destroy')->name('rooms.destroy');
    // update
    Route::get('/rooms/{room}/edit', 'RoomController@edit')->name('rooms.edit');
    Route::put('/rooms/{room}', 'RoomController@update')->name('rooms.update');
    // show
    Route::get('/rooms/{room}', 'RoomController@show')->name('rooms.show');

    /**
     * Equipments Routes
     */
    Route::resource('/equipments', EquipmentController::class);
    // put
    Route::get('/equipment/create', 'EquipmentController@create')->name('equipment.create');
    Route::post('/equipment', 'EquipmentController@store')->name('equipment.store');
    // delet
    Route::delete('/equipment/{equipment}', 'EquipmentController@destroy')->name('equipment.destroy');
    // update
    Route::get('/equipment/{equipment}/edit', 'EquipmentController@edit')->name('equipment.edit');
    Route::put('/equipment/{equipment}', 'EquipmentController@update')->name('equipment.update');
    // show
    Route::get('/equipment/{equipment}', 'EquipmentController@show')->name('equipment.show');

    /**
     * RoomOffers Routes
     */
    Route::resource('/roomoffers', RoomOfferController::class);
    // put
    Route::get('/roomoffer/create', 'RoomOfferController@create')->name('roomoffer.create');
    Route::post('/roomoffer', 'RoomOfferController@store')->name('roomoffer.store');
    // delet
    Route::delete('/roomoffer/{roomoffer}', 'RoomOfferController@destroy')->name('roomoffer.destroy');
    // update
    Route::get('/roomoffer/{roomoffer}/edit', 'RoomOfferController@edit')->name('roomoffer.edit');
    Route::put('/roomoffer/{roomoffer}', 'RoomOfferController@update')->name('roomoffer.update');
    // show
    Route::get('/roomoffer/{roomoffer}', 'RoomOfferController@show')->name('roomoffer.show');

    /** 
     * Services Routes
     */
    Route::resource('/services', ServiceController::class);
    Route::get('/services/{service}', 'ServiceController@showMore')->name('services.more');
    // put
    Route::get('/service/create', 'ServiceController@create')->name('service.create');
    Route::post('/service', 'ServiceController@store')->name('service.store');
    // delet
    Route::delete('/service/{service}', 'ServiceController@destroy')->name('service.destroy');
    // update
    Route::get('/service/{service}/edit', 'ServiceController@edit')->name('service.edit');
    Route::put('/service/{service}', 'ServiceController@update')->name('service.update');
    // show
    Route::get('/service/{service}', 'ServiceController@show')->name('service.show');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        /**
         * Account Routes
         */
        Route::get('/account', 'AccountController@show')->name('account.show');

        /**
         * Subscription Plans Routes
         */
        Route::get('/subscription-plans', 'SubscriptionPlansController@index')->name('subscription-plans.index');
        Route::post('/subscription-plans', 'SubscriptionPlansController@subscribe')->name('subscription-plans.subscribe');
    });

    Route::group(['middleware' => ['auth', 'admin']], function() {
        /**
         * Admin Routes
         */
        Route::get('/admin', 'AdminController@index')->name('admin.index');

        /**
         * Admin Users Routes
         */
        Route::get('/admin/users', 'AdminController@users')->name('admin.users');
        Route::delete('/admin/users/{user}', 'AdminController@deleteUser')->name('admin.users.delete');
        Route::put('/admin/users/{id}', 'AdminController@updateUser')->name('admin.users.update');

        /**
         * Admin Plans Routes
         */
        Route::get('/admin/subscriptions-plans', 'AdminController@SubscriptionsPlan')->name('admin.subscriptions-plans');
        Route::put('/admin/subscriptions-plans', 'AdminController@newSubscriptionsPlan')->name('admin.subscriptions-plans.add');
        Route::patch('/admin/subscriptions-plans/{id}', 'AdminController@updateSubscriptionsPlan')->name('admin.subscriptions-plans.update');
        Route::delete('/admin/subscriptions-plans/{id}', 'AdminController@deleteSubscriptionsPlan')->name('admin.subscriptions-plans.delete');
        Route::put('/admin/subscriptions-plans-feature', 'AdminController@newSubscriptionsPlanFeature')->name('admin.subscriptions-plans-feature.add');
    });
});
