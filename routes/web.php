<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// home page view
Route::get('/', 'PagesController@index')->name('home');
// shopgrid view
Route::get('/shop', 'PagesController@shop')->name('shop');

// shopgrid view
Route::get('/blog', 'PagesController@blog')->name('blog');

// contact us view
Route::get('/contact', 'PagesController@contact')->name('contact');
// shop details view
Route::get('/shop-details', 'PagesController@shopDetails')->name('shopDetails');
// shop chart view
// Route::get('/shoping-cart', 'PagesController@shopCart')->name('shopingCart');
// checkout view
Route::get('/checkout', 'PagesController@blogDetails')->name('checkout');
// blog view
Route::get('/blog-details', 'PagesController@blogDetails')->name('blogDetails');
// socialite route
Route::get('login/{provider}', 'SocialLite@redirect')->name('login');
Route::get('login/{provider}/callback','SocialLite@Callback')->name('login');
// product type route
Route::get('/Category/{id}','Admin\CategoryController@showCategory' )->name('produtCategory');
Route::get('/Product/{id}','PagesController@productDetails' )->name('productDetails');

// register new user
Route::post('/register', 'RegisterController@register')->name('register');
// admin content goew here
Route::group(['middleware' => ['admin']], function () {
    Route::get('/Admin', 'Admin\AdminProductController@index' )->name('admin');
    Route::get('/Admin/Product', 'Admin\AdminProductController@adminproductpage')->name('adminproduct');
    Route::get('/Admin/All Product', 'Admin\AdminProductController@allproduct')->name('allproduct');
    // Route::post('Admin/product', 'Admin\AdminProductController@store' );
    Route::get('/Admin/Category', 'Admin\CategoryController@index')->name('category');
    Route::post('editcategory', 'Admin\CategoryController@show' )->name('editcategory');
    Route::post('deletecategory', 'Admin\CategoryController@delete' )->name('deletecategory');
    Route::post('viewproducts', 'Admin\AdminProductController@viewproduct')->name('viewproducts');
    Route::post('vieweditproducts', 'Admin\AdminProductController@vieweditproduct')->name('vieweditproducts');
    Route::post('viewdeleteproducts', 'Admin\AdminProductController@viewdeleteproduct')->name('viewdeleteproducts');
    Route::post('Admin/Category', 'Admin\CategoryController@create' );
    Route::post('allviewproduct', 'Admin\AdminProductController@allproduct')->name('allviewproduct');
    Route::post('allvieweditproduct','Admin\AdminProductController@allproduct' )->name('allvieweditproduct');
    Route::post('allviewdeleteproduct', 'Admin\AdminProductController@viewdeleteproduct')->name('allviewdeleteproduct');
    Route::resource('Admin/adminproduct', 'Admin\AdminProductController');
    Route::resource('Admin/category', 'Admin\CategoryController');


});

// marketer content goes here
Route::group(['middleware' => ['marketer']], function () {
    Route::get('/Marketer', 'Marketer\MarketerProductController@index')->name('marketer');
    Route::get('/Marketer/Product', 'Marketer\MarketerProductController@marketerproductpage')->name('marketerProduct');
    // Route::post('Marketer/product', 'Marketer\MarketerProductController@store' );
    Route::post('marketerviewproduct', 'Marketer\MarketerProductController@viewproduct')->name('marketerviewproduct');
    Route::post('marketervieweditproduct', 'Marketer\MarketerProductController@vieweditproduct')->name('marketervieweditproduct');
    Route::post('marketerviewdeleteproduct', 'Marketer\MarketerProductController@viewdeleteproduct')->name('marketerviewdeleteproduct');
    Route::resource('Marketer/marketerproduct', 'Marketer\MarketerProductController');



});
// users goes here
Route::group(['middleware' => ['user']], function () {
    Route::view('dashboard', 'users.index')->name('dashboard');
});



Route::group(['middleware' => 'auth'], function () {
    // Route::PATCH('/user/profile/{id}', 'UserUpdateController')->name('profile.update');
    Route::resource('Update/Profile', 'UserUpdateController');


});


// add to cart
Route::resource('AddtoCart', 'CartController');
Route::put('/Cart/update/{cart}', 'CartController@update')->name('cartupdate');


Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
// Route::get('/ShoppingCart', 'CartController@index')->name('shopingCart');
// Route::post('cart','AddtoCart@store')->name('addtocart');
// locate
Route::view('/locate', 'users.locate' );

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


