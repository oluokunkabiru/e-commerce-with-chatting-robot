<?php


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
Route::get('/shoping-cart', 'PagesController@shopCart')->name('shopingCart');
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
    Route::view('admin', 'admin.dashboard' )->name('admin');
    Route::get('/Admin/product', 'ProductController@admin')->name('adminProduct');
    Route::post('Admin/product', 'ProductController@adminProduct' );
    Route::get('/Admin/Category', 'Admin\CategoryController@index')->name('category');
    Route::post('Admin/Category', 'Admin\CategoryController@create' );
    // Route::post('/Admin/Edit/{id}','ProductController@viewproduct')->name('viewproduct');
    Route::post('viewproduct', 'ProductController@viewproduct')->name('viewproduct');
    Route::post('vieweditproduct', 'ProductController@viewditproduct')->name('vieweditproduct');
    Route::post('viewdeleteproduct', 'ProductController@viewdeleteproduct')->name('viewdeleteproduct');
    Route::resource('Admin/products', 'ProductController');


});

// marketer content goes here
Route::group(['middleware' => ['marketer']], function () {
    Route::view('marketer', 'marketers.dashboard')->name('marketer');
    Route::get('/Marketers/product', 'ProductController@marketer')->name('marketerProduct');
    // Route::view('newproduct', 'marketers.newproduct');
    Route::post('Marketers/product', 'ProductController@marketerProduct' );



});
// users goes here
Route::group(['middleware' => ['user']], function () {
    Route::view('dashboard', 'users.index')->name('dashboard');
});
Route::group(['middleware' => 'auth'], function () {
    Route::PATCH('/user/profile/{id}', 'UserUpdate@userupdate')->name('profile.update');

});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/cart', 'AddtoCart@index')->name('cart');
Route::post('cart','AddtoCart@store')->name('addtocart');
// locate
Route::view('/locate', 'users.locate' );

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


