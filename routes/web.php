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
Route::post('password-phone','Auth\ForgotPasswordController@passwordPhone')->name('password.phone');
Route::get('password-phone/reset','Auth\ResetPasswordController@getPasswordResetPhone')->name('password.phone.reset');
Route::post('password-phone/reset','Auth\ResetPasswordController@passwordDoResetPhone')->name('password.phone.reset.password');
Route::post('verify-phone','Auth\VerificationController@verifyPhone')->name('verify.phone')->middleware('auth');
Route::post('verify-phone/edit','Auth\VerificationController@editPhone')->name('verify.edit.phone')->middleware('auth');
Route::post('verify-phone/resend','Auth\VerificationController@resendCode')->name('verify.phone.resend');
Route::post('/profile/settings/changePassword','Auth\LoginController@changePassword')->name('profile.update.password')->middleware('auth');

Route::group(['middleware' => ['verified', 'can_access_dashboard'], 'prefix' => 'dashboard'], function () {
    Route::get('/', 'DashboardController')->name('dashboard');
    Route::get('account','Administrator\AdministratorAccountBalanceController@account')->name('admin.account');
    Route::get('orders','Administrator\AdministratorOrderController@index')->name('admin.orders.index');
    Route::get('orders/{order}','Administrator\AdministratorOrderController@show')->name('admin.orders.show');
    Route::get('invoices','Administrator\AdministratorOrderController@invoicesIndex')->name('admin.invoices.index');
    Route::get('receipts','Administrator\AdministratorOrderController@receiptsIndex')->name('admin.receipts.index');
    Route::get('ipayTxns','Administrator\AdministratorOrderController@ipayTxnsIndex')->name('admin.ipayTxns.index');
    Route::resource('stores', 'StoreController');
    Route::get('myAccount/{store}','StoreController@storeAccount')->name('stores.account');
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
    Route::get('/profile/settings','WebsitePageController@mySettings')->name('profile.settings')->middleware('auth');
    Route::get('/profile/orders', 'WebsitePageController@myOrders')->name('profile.orders')->middleware('auth');
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
    Route::get('checkout','OrderController@getCheckout')->name('checkout')->middleware(['auth','phone_verified']);
    Route::post('order','OrderController@order')->name('perform.checkout')->middleware(['auth','phone_verified']);
    Route::get('ipcbk','OrderController@ipayCallback')->name('ipay.callback');
});
