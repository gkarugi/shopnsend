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
    Route::resource('stores/{store}/branches', 'StoreBranchController');
    Route::resource('categories', 'ProductCategoryController');
    Route::resource('productGroupings', 'ProductGroupingController');
    Route::resource('products', 'ProductController');
});

Route::group(['as' => 'website.', 'namespace' => 'Website'],function () {
    Route::get('/','WebsitePageController@home')->name('home');
    Route::resource('categories','WebsiteCategoryController')->only(['index','show']);
    Route::resource('stores','WebsiteStoreController')->only(['index','show']);
    Route::resource('products','WebsiteProductController')->only(['index','show']);
    Route::get('about','WebsitePageController@about')->name('about');
    Route::get('contact','WebsitePageController@contact')->name('contact');
});
