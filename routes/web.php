<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Whoops\Run;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', 'PagesController@index')->name('home');
// shopgrid view
Route::get('/shop', 'PagesController@shop')->name('shop');

// shopgrid view
Route::get('/blog', 'PagesController@blog')->name('blog');

// contact us view
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::get('/about-us', 'PagesController@about')->name('about');

// Chatting negotiation
Route::match(['get', 'post'], '/botman', 'NegotiateController@robot')->name('botman');
// shop details view
Route::get('negotiate', 'NegotiateController@negotiate')->name('negotiate');

Route::get('service/{slug}', 'PagesController@services')->name('services-details');
Route::get('/shop-details', 'PagesController@shopDetails')->name('shopDetails');
// shop chart view
// Route::get('/shoping-cart', 'PagesController@shopCart')->name('shopingCart');
// checkout view
Route::get('/checkout', 'PagesController@blogDetails')->name('checkout');
Route::get('/how-to-become-a-vendor', 'PagesController@becomeAvendor')->name('become-a-vendor');
// blog view
// Route::get('/blog-details', 'PagesController@blogDetails')->name('blogDetails');
// socialite route
Route::get('login/{provider}', 'SocialLite@redirect')->name('login');
Route::get('login/{provider}/callback','SocialLite@Callback')->name('login');
Route::get('/clear-cart', 'CartController@clearCart')->name('clearCart');
// product type route
Route::get('/Category/{id}','Admin\CategoryController@showCategory' )->name('produtCategory');
Route::get('/Product/{id}','PagesController@productDetails' )->name('productDetails');
Route::get('consultant', 'PagesController@consultant')->name('consultant');
Route::post('consult-us', 'PagesController@consultantus')->name('consult-us');
Route::get('counsult-thank/{name}', 'PagesController@consultantThanks')->name('consult-thanks');
// The page that displays the payment form for flutterwave

// The route that the button calls to initialize payment
Route::get('marketer-fee', 'PagesController@marketerpayment')->name('marketer-fee');


Route::post('/payment/flutterwave', 'FlutterPaymentController@initialize')->name('product-flutterwave');
// The callback url after a payment
Route::get('/payment/flutterwave/callback', 'FlutterPaymentController@callback')->name('product-flutterwve-callback');


// The route that the button calls to initialize payment
// Route::get('marketer-fee', 'PagesController@marketerpayment')->name('marketer-fee');
Route::post('/marketer-fee-flutterwave', 'FlutterPaymentController@initializemarketer')->name('flutterwave-marketer-fee');
// The callback url after a payment
Route::get('/marketer-fee/rave/callback', 'FlutterPaymentController@marketerFee')->name('fluterwavemarkerfeecallback');

Route::get('continue-payment/paystack/{id}', 'CheckoutController@paystackPayment')->name('continue-with-paystack');
Route::get('continue-payment/flutterwave/{id}', 'CheckoutController@flutterwavePayment')->name('continue-with-flutterwave');
// Payment With Paystack

// Route::post('/pay', 'PaystackPaymentController@redirectToGateway')->name('product-paystack');
// Route::get('/payment/callback', 'PaystackPaymentController@handleGatewayCallback');
Route::post('/product/pay-with-paystack', 'PaystackPaymentController@paystackPayment')->name('productpaywithpaystack');

Route::post('/marketer', 'PaystackPaymentController@marketerFee')->name('paystack-marketer-fee');
Route::get('/marketer/payment/callback', 'PaystackPaymentController@marketerHandleGatewayCallback');


Route::post('get-state', 'PagesController@states')->name('state-list');
Route::post('get-cities', 'PagesController@cities')->name('cities-list');
// register new user
Route::post('/register', 'RegisterController@register')->name('register');
Route::get('store/{username}', 'PagesController@mystore')->name('store');
// admin content goew here
Route::group(['middleware' => ['admin']], function () {
    Route::get('change-product/{id}/{status}', 'ProductController@changeProductMode')->name('changeprodctmode');
    Route::get('pending-product', 'ProductController@pendingProduct')->name('pending-product');
    Route::get('disabled-product', 'ProductController@disabledProduct')->name('disabled-product');
    Route::get('/Admin', 'Admin\AdminController@index' )->name('admin');
    Route::get('/Admin/Product', 'Admin\AdminProductController@adminproductpage')->name('adminproduct');
    Route::get('/Admin/All Product', 'Admin\AdminProductController@allproduct')->name('allproduct');
    // Route::post('Admin/product', 'Admin\AdminProductController@store' );
    Route::resource('services', 'ServicesController');
    Route::get('/Admin/Category', 'Admin\CategoryController@index')->name('category');
    Route::post('editcategory', 'Admin\CategoryController@show' )->name('editcategory');
    Route::post('deletecategory', 'Admin\CategoryController@delete' )->name('deletecategory');
    Route::post('viewproducts', 'Admin\AdminProductController@viewproduct')->name('viewproducts');
    Route::post('vieweditproducts', 'Admin\AdminProductController@vieweditproduct')->name('vieweditproducts');
    Route::post('viewdeleteproducts', 'Admin\AdminProductController@viewdeleteproduct')->name('viewdeleteproducts');
    Route::post('Admin/Category', 'Admin\CategoryController@create' );
    Route::resource('/Admin/Settings', 'Admin\SettingsController');
    Route::put('aboutandaddress', 'Admin\SettingsController@about')->name('aboutandaddress');
    // Route::post('allviewproduct', 'Admin\AdminProductController@vieweditproduct')->name('allviewproduct');
    // Route::post('allvieweditproduct','Admin\AdminProductController@vieweditproduct' )->name('allvieweditproduct');
    Route::post('allviewdeleteproduct', 'Admin\AdminProductController@viewdeleteproduct')->name('allviewdeleteproduct');
    Route::resource('Admin/adminproduct', 'Admin\AdminProductController');
    Route::resource('Admin/category', 'Admin\CategoryController');
    Route::get('/All-users', 'Admin\AdminController@allUsers')->name('allusers');
    Route::get('/All-marketer', 'Admin\AdminController@allMarketer')->name('allmarketers');
    Route::get('/user/details/{id}/{name}', 'Admin\AdminController@userDetails')->name('users-details');

    Route::get('/Admin/Customer/Orders', 'Admin\AdminController@adminorders')->name('adminorders');
    Route::get('/Admin/Customer/AllOrders', 'Admin\AdminController@allOrders')->name('allOrders');
    Route::post('Admin/viewOrders', 'Admin\AdminController@adminViewOrder')->name('adminViewOrders');
    Route::post('Admin/processOrders', 'Admin\AdminController@deliver')->name('adminProcessOrders');
    Route::put('Admin/deliverOrders', 'Admin\AdminController@delivered')->name('adminDelivered');
    Route::post('Admin/viewAllOrders', 'Admin\AdminController@viewAllOrderStatus')->name('viewAllOrderStatus');
    Route::get('/Admin/Customers', 'Admin\AdminController@adminBuyers')->name('adminBuyers');
    Route::get('/Admin/AllCustomers', 'Admin\AdminController@allBuyers')->name('allBuyers');
    Route::post('/Admin/customersInformation', 'Admin\AdminController@buyersInformation')->name('customersInformtion');
    Route::get('/Admin/Customers/Messages', 'ContactUs@index')->name('custmersMessages');
    Route::post('showmessage', 'ContactUs@shows')->name('readmessage');
    Route::get('Admin/Marketers/Request', 'Admin\AdminController@marketerRequest')->name('marketerRequest');
    Route::post('acceptMarketer', 'Admin\AdminController@acceptMarketer')->name('acceptMarketer');

    Route::resource('/Admin/how-to-become-a-vendow', 'VendorController');
    // Payment out
    Route::get('Admin/payment/make-payment', 'Admin\AdminController@makePayout')->name('make-payout');
    Route::get("payout-now/{id}/{status}", 'Admin\AdminController@acceptPayment')->name('payout-now');
    Route::get('Admin/payment/history', 'Admin\AdminController@PayoutHistory')->name('payout-history');



});

// marketer content goes here
Route::group(['middleware' => ['marketer']], function () {
    Route::get('/Marketer', 'Marketer\MarketerController@index')->name('marketer');
    Route::get('/Marketer/Product', 'Marketer\MarketerProductController@marketerproductpage')->name('marketerProduct');
    // Route::post('Marketer/product', 'Marketer\MarketerProductController@store' );
    Route::post('marketerviewproduct', 'Marketer\MarketerProductController@viewproduct')->name('marketerviewproduct');
    Route::post('marketervieweditproduct', 'Marketer\MarketerProductController@vieweditproduct')->name('marketervieweditproduct');
    Route::post('marketerviewdeleteproduct', 'Marketer\MarketerProductController@viewdeleteproduct')->name('marketerviewdeleteproduct');
    Route::resource('Marketer/marketerproduct', 'Marketer\MarketerProductController');
    Route::get('/marketer/heading' , 'Marketer\MarketerProductController@index');
    Route::get('/test', 'Marketer\MarketerController@test')->name('test');
    Route::post('marketervieworder', 'Marketer\MarketerController@marketerViewOrder')->name('marketervieworder');
    Route::post('marketerviewdeliverorder', 'Marketer\MarketerController@deliver')->name('marketerviewdeliverorder');
    Route::put('marketerdelivered', 'Marketer\MarketerController@delivered')->name('marketerDelivered');
    Route::get('/Marketer/Orders', 'Marketer\MarketerController@marketerOrders')->name('marketerAllOrders');
    Route::get('Marketer/Customers', 'Marketer\MarketerController@marketersBuyers')->name('marketerBuyers');
    Route::post('/Marketer/Customers/Details', 'Marketer\MarketerController@buyersinformation')->name('marketerCustomerDetails');
});
// users goes here
Route::group(['middleware' => ['user']], function () {
    Route::view('dashboard', 'users.index')->name('dashboard');
});



Route::group(['middleware' => 'auth'], function () {
    // Route::PATCH('/user/profile/{id}', 'UserUpdateController')->name('profile.update');
    Route::resource('Update/Profile', 'UserUpdateController');
    Route::resource('Checkout', 'CheckoutController');
    Route::view('Thanks', 'pages.thanks')->name('thanks');
    Route::get('/History', 'HistoryController@index')->name('history');
    Route::post('History', 'HistoryController@shows')->name('showhistory');
    Route::resource('contactus', 'ContactUs');

});


// add to cart
Route::resource('AddtoCart', 'CartController');
Route::put('/Cart/update/{cart}', 'CartController@update')->name('cartupdate');


Auth::routes();

// Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/ShoppingCart', 'CartController@index')->name('shopingCart');
// Route::post('cart','AddtoCart@store')->name('addtocart');
// locate
Route::view('/locate', 'users.locate' );

Auth::routes();

Route::get('/home', 'HomeController@index')->name('dash');

// Route::get('/test', 'MarketerMarketerController@test');
Route::get('/test', 'PagesController@heads');
