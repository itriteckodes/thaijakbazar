<?php

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

Route::group(['namespace' => 'App\Http\Controllers','middleware' => 'setlanguage'], function () {

//Login Area
    Route::view('login', 'auth.login')->name('login');
    Route::post('login','AuthController@login')->name('login.post');
//End Login Area

//Forget
Route::view('forget/password', 'user.auth.emailverify')->name('password.forget');
Route::get('reset/{code}','AuthController@verify')->name('forget');
Route::post('reset/password','AuthController@ResetPassword')->name('reset');
Route::post('send/forget','AuthController@sendForget')->name('sendlink');


//User Registration
    Route::view('register', 'user.auth.register')->name('user.register');
    Route::post('user/register','AuthController@registerUser')->name('user_register');
//End User Registration

//Vendor Login
    Route::view('vendor/login', 'vendor.auth.login')->name('vendor.login');
    Route::post('vendor/login','AuthController@VendorLogin')->name('vendor.login.post');
//End Vendor Login

//Vendor Registration
    Route::view('vendor/register', 'vendor.auth.register')->name('register');
    Route::post('vendor-register','AuthController@registerVendor')->name('vendor_register');
    Route::get('verify/{code}','AuthController@verifyEmail');
//End Vendor Registration

//Admin Routes
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.',], function () {

        Route::view('login', 'admin.auth.login')->name('login');
        Route::post('login', 'AuthController@login')->name('adminlogin');
        Route::view('welcome','admin.welcome.index')->name('welcome')->middleware('auth:admin');
        Route::get('logout', 'AuthController@logout')->name('logout')->middleware('auth:admin');

        Route::get('{id}/language', 'LanguageController@ChangeLanguage')->name('language');

        Route::group(['middleware' => ['auth:admin','hasrole']], function () {
            Route::view('dashboard', 'admin.dashboard.index')->name('dashboard');
            Route::view('account/dashboard', 'admin.dashboard.accountDashboard')->name('accountDashboard');
           
            Route::resource('category', 'CategoryController');
            Route::resource('subcategory', 'SubcategoryController');
            Route::resource('user', 'UserController');
            Route::resource('profile', 'ProfileController');
            Route::resource('vendor', 'VendorController');
            Route::post('add/balance', 'VendorController@AddBalance')->name('addbalance');
            Route::post('subtract/balance', 'VendorController@SubtractBalance')->name('subbalance');
            Route::get('vendor/tickets/{vendor}', 'VendorController@Tickets')->name('get-tickets');
            Route::get('vendor/products/{vendor}', 'VendorController@VendorProducts')->name('vendorproducts');
            Route::post('user/add/balance', 'UserController@AddBalance')->name('user.addbalance');
            Route::post('user/subtract/balance', 'UserController@SubtractBalance')->name('user.subbalance');
            Route::resource('gateway', 'GatewayController');
            Route::resource('contact', 'ContactController');
            Route::get('subscribers', 'NewsLetterController@index')->name('newsletter');
            Route::post('newsletter', 'NewsLetterController@setMail')->name('sendnewsletter');
            Route::resource('setting','GeneralSettingController');
            Route::resource('product','ProductController');
            Route::resource('admins','AdminController');
            Route::resource('coupon','CouponController');
            Route::resource('image','ProductImageController');
            Route::resource('withdraw','WithdrawController');
            Route::resource('blog','BlogController');
            Route::post('accept/withdraw', 'WithdrawController@accept')->name('accept');
            Route::post('reject/withdraw', 'WithdrawController@reject')->name('reject');

            Route::get('accepted/withdraw','WithdrawController@acceptedRequests')->name('withdraw.accept');
            Route::get('rejected/withdraw','WithdrawController@rejectedRequests')->name('withdraw.reject');

            Route::get('orders/index/{id}','OrderController@index')->name('order.index'); 
            Route::get('user/orders/{id}','OrderController@UserOrder')->name('order.user');
            Route::get('orders/pending','OrderController@pending')->name('order.pending');
            Route::get('orders/ready','OrderController@ready')->name('order.ready');
            Route::get('orders/ready/{id}','OrderController@readyToShip')->name('order.readyToShip');
            Route::get('orders/accepted','OrderController@accepted')->name('order.accepted');
            Route::get('orders/rejected','OrderController@rejected')->name('order.rejected');
            Route::get('orders/dispatched','OrderController@dispatched')->name('order.dispatched');
            Route::get('orders/delivered','OrderController@delivered')->name('order.delivered');
            Route::get('orders/history','OrderController@history')->name('order.history');
            Route::get('orders/details/{id}','OrderController@details')->name('order.details');
            Route::post('orders/comment/{id}','OrderController@comments')->name('add-comment');
            // change order status
            Route::get('order/status/accept/{id}','OrderController@accept')->name('order.status.accept');
            Route::get('order/status/deliver/{id}','OrderController@deliver')->name('order.status.deliver');
            Route::get('order/status/dispatch/{id}','OrderController@dispatch')->name('order.status.dispatch');
            Route::get('order/status/reject/{id}','OrderController@reject')->name('order.status.reject');
            Route::post('company/balance-add','DashboardController@AddBalance')->name('comp-add-bal');
            Route::post('company/subtract-add','DashboardController@SubtractBalance')->name('comp-sub-bal');
           
            Route::get('transactions/vendor','TransactionController@vendor')->name('transaction.vendor');
            Route::get('transactions/user','TransactionController@user')->name('transaction.user');
            Route::get('transactions/company','TransactionController@company')->name('transaction.company');
            Route::resource('slider','SliderController');
            Route::resource('ticket','TicketController');
            Route::resource('reply','TicketReplyController'); 
            Route::resource('withdrawmethod','WithdrawMethodController');
            Route::resource('account-approval','AccountApprovalController');
            Route::resource('deposit-method','DepositMethodController');
            Route::resource('banner','BannerController');
            Route::resource('withdraw-account', 'WithdrawAccountController');
            Route::resource('news-ticker', 'NewsTickerController');
            Route::resource('tax', 'TaxController');

            Route::post('accept/withdraw/account','WithdrawAccountController@accept')->name('withdraw.account.accept');
            Route::post('reject/withdraw/account','WithdrawAccountController@reject')->name('withdraw.account.reject');

            Route::view('policy/terms&conditions', 'admin.policy.terms')->name('terms');
            Route::post('save/terms','PolicyController@TermsCondition')->name('save_terms');
            Route::view('policy/refund', 'admin.policy.refund')->name('refund');
            Route::post('save/refund','PolicyController@RefundPolicy')->name('save_refund');
            Route::view('policy/replacement', 'admin.policy.replacement')->name('replacement');
            Route::post('save/replacement','PolicyController@ReplacementPolicy')->name('save_replacement'); 
            Route::view('policy/privacy', 'admin.policy.privacy')->name('privacy');
            Route::post('save/privacy','PolicyController@PrivacyPolicy')->name('save_privacy');

            Route::view('howitworks', 'admin.policy.howitworks')->name('howitworks');
            Route::post('save/howitworks','HowItWorksController@HowItWorks')->name('save_howitworks');

            Route::view('abouts', 'admin.policy.aboutus')->name('aboutus');
            Route::post('save/aboutus','PolicyController@AboutUs')->name('save_aboutus');

            Route::get('user/{id}/accounts','UserController@Accounts')->name('user-accounts');
        });
    });

//Vendor Routes
    Route::group(['prefix' => 'vendor','middleware' => 'auth:vendor', 'namespace' => 'Vendor', 'as' => 'vendor.',], function () {
        Route::view('dashboard', 'vendor.dashboard.index')->name('dashboard');
        Route::resource('product','ProductController'); 
        Route::resource('productImage','ProductImageController'); 
        Route::resource('coupan','CoupanController'); 
        Route::get('product/images/{id}','ProductController@images')->name('product.images');
        Route::post('ajax/fetch/subcategories','ProductController@fetchSubCat')->name('fetch_subcat');
        Route::resource('profile','ProfileController');
        Route::get('withdraw/new/request','WithdrawController@newRequest')->name('withdraw.newRequest');
        Route::post('withdraw/create/request','WithdrawController@createRequest')->name('withdraw.createRequest');
        Route::get('withdraw/pending/requests','WithdrawController@pendingRequests')->name('withdraw.pendingRequests');
        Route::get('withdraw/completed/requests','WithdrawController@completedRequests')->name('withdraw.completedRequests');
        Route::get('withdraw/rejected/requests','WithdrawController@rejectedRequests')->name('withdraw.rejectedRequests');
        Route::get('withdraw/history','WithdrawController@history')->name('withdraw.history');
        Route::get('orders/pending','OrderController@pending')->name('order.pending');
        Route::get('orders/accepted','OrderController@accepted')->name('order.accepted');
        Route::get('orders/rejected','OrderController@rejected')->name('order.rejected');
        Route::get('orders/dispatched','OrderController@dispatched')->name('order.dispatched');
        Route::get('orders/delivered','OrderController@delivered')->name('order.delivered');
        Route::get('orders/history','OrderController@history')->name('order.history');
        Route::get('orders/ready','OrderController@ready')->name('order.ready');
        Route::get('orders/ready/{id}','OrderController@readyToShip')->name('order.readyToShip');
            // change order status
        Route::get('order/status/accept/{id}','OrderController@accept')->name('order.status.accept');
        Route::get('order/status/deliver/{id}','OrderController@deliver')->name('order.status.deliver');
        Route::get('order/status/dispatch/{id}','OrderController@dispatch')->name('order.status.dispatch');
        Route::get('order/status/reject/{id}','OrderController@reject')->name('order.status.reject');


        Route::get('orders/details/{id}','OrderController@details')->name('order.details');
        Route::get('settings','SettingController@index')->name('settings');
        Route::post('settings/update','SettingController@update')->name('setting.update');
        Route::get('transactions','TransactionController@index')->name('transactions');
        Route::get('logout', 'AuthController@logout')->name('logout');

        Route::resource('ticket', 'TicketController');
        Route::resource('reply', 'TicketReplyController');
        Route::resource('deposit', 'DepositController');
        Route::resource('withdraw-account', 'WithdrawAccountController');
    });

//User Routes
    Route::group(['prefix' => 'user','middleware' => 'auth', 'namespace' => 'User', 'as' => 'user.',], function () {
        Route::view('dashboard','user.dashboard.index')->name('dashboard');
        Route::resource('profile', 'ProfileController');
        Route::resource('order', 'OrderController');
        Route::resource('wishlist', 'WishlistController');
        Route::resource('ticket', 'TicketController');
        Route::resource('reply', 'TicketReplyController');
        Route::resource('withdraw', 'WithdrawController');
        Route::resource('deposit', 'DepositController');
        Route::resource('withdraw-account', 'WithdrawAccountController');
        Route::get('accepted/withdraw', 'WithdrawController@accepted')->name('withdraw.accepted');
        Route::get('rejected/withdraw', 'WithdrawController@rejected')->name('withdraw.rejected');
        Route::get('add/wishlist/{pid}','WishlistController@add')->name('addwish');
        Route::get('transactions','TransactionController@index')->name('transactions');

        Route::get('processing/order','OrderController@processing')->name('order.processing');
        Route::get('canceled/order','OrderController@canceled')->name('order.canceled');
        
    });

//Front Routes
    Route::group(['namespace' => 'Front', 'as' => 'front.',], function () {

        Route::get('/', 'HomeController@index')->name('home');
        Route::view('about', 'front.about.index')->name('about');
        Route::resource('contact-us','ContactController');
        Route::post('store/newsletter','NewsletterController@store')->name('newsletter');
        Route::resource('product', 'ProductController');
        Route::get('shop','ShopController@index')->name('shop');
        Route::resource('category', 'CategoryController');
        Route::resource('subcategory', 'SubCategoryController');
        Route::get('search','SearchController@search')->name('search');
        Route::get('filter/search','SearchController@FilterSearch')->name('FilterSearch');
        Route::resource('checkout', 'CheckoutController');
        Route::resource('order', 'OrderController');
        Route::resource('vendor', 'VendorController');
        Route::resource('blog', 'BlogController');

        Route::any('cart', 'CartController@index')->name('cart');
        Route::any('cart/clear', 'CartController@clear')->name('cart.clear');
        Route::any('cart/add', 'CartController@add')->name('cart.add');
        Route::any('cart/remove', 'CartController@remove')->name('cart.remove');
        Route::any('cart/decrease', 'CartController@decrease')->name('cart.decrease');
        Route::any('cart/increase', 'CartController@increase')->name('cart.increase');
        Route::any('cart/coupon/apply', 'CartController@applyCoupon')->name('cart.coupon.apply');

        Route::get('{key}/policy', 'PolicyController@index')->name('policy');
        Route::get('info/howitworks', 'PolicyController@howitworks')->name('howitworks');

        Route::view('track/order','front.track-order.index')->name('trackorder');
        Route::post('track/order','TrackOrderController@trackOrder')->name('post.trackorder');

        Route::get('{id}/language', 'PageController@ChangeLanguage')->name('language');

        Route::get('get/tickets', 'PageController@GetTickets');
        
        Route::get('tickets', 'PageController@Tickects')->name('ticket')->middleware('auth:admin');
        
    });

    Route::get('user/logout', 'AuthController@logout')->middleware('auth')->name('logout');
    
});