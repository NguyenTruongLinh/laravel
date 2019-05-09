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

Auth::routes();

Route::group(['namespace' => 'Auth'], function (){
    Route::get('dang-ky', 'RegisterController@getRegister')->name('get.register');
    Route::post('dang-ky', 'RegisterController@postRegister')->name('post.register');

    Route::get('dang-nhap', 'LoginController@getLogin')->name('get.login');
    Route::post('dang-nhap', 'LoginController@postLogin')->name('post.login');

    Route::post('reset', 'ResetPasswordController@sendCodeResetPassword')->name('post.reset.password');
    Route::get('reset/password', 'ResetPasswordController@resetPassword')->name('get.reset.password');

    Route::get('dang-xuat', 'LoginController@getLogout')->name('get.logout.user');
});

Route::get('/', 'HomeController@index')->name('home');

Route::get('danh-muc/{slug}-{id}','CategoryController@getListProduct')->name('get.list.product');
Route::get('san-pham/{slug}-{id}','ProductDetailController@productDetail')->name('get.detail.product');
Route::get('san-pham','CategoryController@getListProduct')->name('get.search.product');

// Route Shopping
Route::group(['prefix' => 'shopping'], function () {
    Route::post('/danh-sach','ShoppingCartController@addProduct')->name('add.cart');
    Route::get('/danh-sach','ShoppingCartController@getListShoppingCart')->name('get.list.shopping.cart');
    Route::get('/delete/{id}','ShoppingCartController@deleteCart')->name('delete.shopping.cart');
    Route::get('/delete','ShoppingCartController@destroyCart')->name('destroy.shopping.cart');
    Route::get('/danh-sach/update/{id}','ShoppingCartController@updateCart')->name('update.shopping.cart');
});

// Route don mua hang
Route::group(['prefix' => 'don-mua','middleware' => 'CheckLoginUser'],function () {
    Route::get('/{id}','ShoppingCartController@getPurchase')->name('get.purchase');
});

// Route thanh toan
Route::group(['prefix' => 'gio-hang','middleware' => 'CheckLoginUser'],function () {
    Route::get('/thanh-toan','ShoppingCartController@getFormPay')->name('get.form.pay');
    Route::post('/thanh-toan','ShoppingCartController@saveInfoShoppingCart');
});

// Route danh gia
Route::group(['prefix' => 'ajax','middleware' => 'CheckLoginUser'],function () {
    Route::post('/danh-gia/{id}','RatinController@saveRating')->name('post.rating.product');
});

Route::group(['prefix' => 'ajax'],function () {
    Route::post('/view-product', 'HomeController@renderProductView')->name('post.product.view');
});

Route::get('lien-he','ContactController@getContact')->name('get.contact');
Route::post('lien-he','ContactController@saveContact');

// route User
Route::group(['prefix' => 'user','middleware' => 'CheckLoginUser'],function () {
    Route::get('/account/profile', 'UserController@index')->name('get.profile.view');
    Route::post('/account/profile', 'UserController@updateProfile');
    Route::get('/purchase/{id}', 'UserController@getPurchase')->name('get.purchase.view');
    Route::get('/purchase/{id}/processed', 'UserController@getPurchaseProcessed')->name('get.purchase.processed.view');

    Route::get('/account/password', 'UserController@viewPassword')->name('get.password.view');
    Route::post('/account/password', 'UserController@updatePassword');

    Route::get('/account/phone', 'UserController@viewPhone')->name('get.phone.view');
    Route::post('/account/phone', 'UserController@checkPassword');

    Route::get('/account/phone/step-2', 'UserController@viewPhoneStep2');
    Route::post('/account/phone/step-2', 'UserController@changePhone');

    Route::get('/account/email', 'UserController@viewEmail')->name('get.email.view');
    Route::post('/account/email', 'UserController@checkPasswordEmail');

    Route::get('/account/email/step-2', 'UserController@viewEmailStep2');
    Route::post('/account/email/step-2', 'UserController@changeEmail');
});