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

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'verified', 'prefix' => 'dashboard'], function () {
    Route::get('/', 'Administrator\AdministratorDashboardController')->name('dashboard');
    Route::resource('stores', 'StoreController');
    Route::post('stores/{store}/feature', 'StoreController@feature')->name('stores.feature');
    Route::resource('stores/{store}/branches', 'StoreBranchController');
    Route::resource('stores/{store}/branches/{branch}/cashiers', 'StoreBranchCashiersController');
    Route::resource('categories', 'ProductCategoryController');
    Route::post('categories/{category}/feature', 'ProductCategoryController@feature')->name('categories.feature');
    Route::resource('productGroupings', 'ProductGroupingController');
    Route::resource('products', 'ProductController');
    Route::post('products/{product}/feature', 'ProductController@feature')->name('products.feature');
    Route::resource('stores/{store}/orders', 'OrderController')->only(['index','show']);
    Route::get('pos', 'POSController@index')->name('pos.index');
    Route::post('redeem', 'POSController@redeemItems')->name('pos.redeemItems');
    Route::get('pos/redeemed/{code}', 'POSController@redeemedItems')->name('pos.redeemedItems');
});

Route::group(['as' => 'website.', 'namespace' => 'Website'],function () {
    Route::get('/','WebsitePageController@home')->name('home');
    Route::resource('categories','WebsiteCategoryController')->only(['index','show']);
    Route::resource('stores','WebsiteStoreController')->only(['index','show']);
    Route::resource('products','WebsiteProductController')->only(['index','show']);
    Route::get('categories/{category}/menus','WebsiteProductController@byCategory')->name('products.category.index');
    Route::get('about','WebsitePageController@about')->name('about');
    Route::get('contact','WebsitePageController@contact')->name('contact');
    Route::post('cartAdd/{product}','OrderController@addToCart')->name('cartAdd');
    Route::get('cart','OrderController@getCart')->name('cart');
    Route::post('cartQtyAdd','OrderController@qtyAdd')->name('cartQtyAdd');
    Route::post('cartQtySub','OrderController@qtySub')->name('cartQtySub');
    Route::post('cartRemove','OrderController@cartRemove')->name('cartRemove');
    Route::get('checkout','OrderController@getCheckout')->name('checkout');
    Route::post('order','OrderController@order')->name('perform.checkout');
    Route::get('ipcbk','OrderController@ipayCallback')->name('ipay.callback');
});
