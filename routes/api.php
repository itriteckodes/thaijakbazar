<?php

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


Route::group(['namespace' => 'App\Http\Controllers\Api'], function () {

    Route::any('vendor/login','Vendor\AuthController@login');

    Route::post('login','AuthController@login');
    Route::post('register','AuthController@register');
    Route::post('register/free','AuthController@freeRegister');
    Route::view('cart/before', 'api.cart.before')->name('api.cart.before');
    Route::any('banners','BannerController@getBanners');

    Route::post('forget','AuthController@sendForget');

    Route::any('ticket/store', 'TicketController@store');
    Route::any('ticket/get', 'TicketController@getTicket');
    Route::any('ticket/replies', 'TicketController@getTicketReplies');
    Route::any('store/ticket-reply', 'TicketController@storeTicketReply');
    Route::any('ticket/customer/get', 'TicketController@getCustomerTickets');
    
    Route::group(['middleware' => 'auth:vendor_api'], function () {
    });
    Route::group(['middleware' => 'auth:api'], function () {
        Route::any('home','HomeController@index');

        
        Route::any('product/show','ProductController@show');
        Route::any('product/review','ReviewController@add');
        Route::any('vendor/products','ProductController@VendorProducts');
        Route::any('category/products','ProductController@CategoryProducts');
        Route::any('user/update','UserController@update');
        Route::any('user/canreview','CanReviewController@index');
        Route::any('user/review','ReviewController@index');
        Route::any('user/wish','WishListController@index');
        Route::any('user/order','OrderController@index');
        
        Route::any('user/wish/add','WishListController@add');
        Route::any('user/review/add','ReviewController@add');

        Route::any('user/show','UserController@User');
        Route::any('search','ProductController@search');
        Route::any('products/name','ProductController@ProductName');
        Route::any('cart/qty','ProductController@GetCartQty');

        Route::any('user/wish/remove','WishListController@remove');

       

    });
});



//Webview Routes.
Route::group(['namespace' => 'App\Http\Controllers\Front'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('checkout', 'CheckoutController@index')->name('api.checkout.index');
        Route::post('checkout', 'CheckoutController@store')->name('api.checkout.store');
        Route::get('checkout/{checkout}', 'CheckoutController@show')->name('api.checkout.show');
        Route::post('order', 'OrderController@store')->name('api.order.store');

        Route::view('cart', 'api.cart.index')->name('api.cart.index');
        Route::any('cart/clear', 'CartController@clear')->name('api.cart.clear');
        Route::any('cart/add', 'CartController@add')->name('api.cart.add');
        Route::any('cart/remove', 'CartController@remove')->name('api.cart.remove');
        Route::any('cart/decrease', 'CartController@decrease')->name('api.cart.decrease');
        Route::any('cart/increase', 'CartController@increase')->name('api.cart.increase');
        Route::any('ajax/cart/coupon/apply', 'CartController@applyCoupon')->name('api.cart.coupon.apply');
    });
});