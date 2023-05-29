<?php

use App\Http\Controllers\AccountController;
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
        Route::post('/subscription-plans/{user_id}/{plan_id}', 'SubscriptionPlansController@subscribe')->name('subscription-plans.subscribe');
        Route::get('/subscription-plans/check', 'SubscriptionPlansController@checkSubscription')->name('subscription-plans.check');
        Route::delete('/subscription-plans/{user_id}', 'SubscriptionPlansController@unsubscribe')->name('subscription-plans.unsubscribe');
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
        Route::get('/admin/subscriptions-plans/features', 'AdminController@SubscriptionsPlanFeatures')->name('admin.subscriptions-plans.features');
        Route::put('/admin/subscriptions-plans/features', 'AdminController@newSubscriptionsPlanFeature')->name('admin.subscriptions-plans.feature.add');
        Route::patch('/admin/subscriptions-plans/features/{id}', 'AdminController@updateSubscriptionsPlanFeature')->name('admin.subscriptions-plans.feature.update');
        Route::delete('/admin/subscriptions-plans/features/{id}', 'AdminController@deleteSubscriptionsPlanFeature')->name('admin.subscriptions-plans.feature.delete');
    });
});
