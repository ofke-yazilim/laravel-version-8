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

Route::get('/', '\App\Http\Controllers\Frontent\FrontentController@main')->name('frontent.main');
Route::get('/dashboard', '\App\Http\Controllers\Frontent\FrontentController@index')->name('frontent.index');
Route::get('/product', '\App\Http\Controllers\Frontent\FrontentController@show')->name('frontent.products.show');
Route::get('/logout', '\App\Http\Controllers\Frontent\FrontentController@logout')->name('frontent.logout');
//Route::any('/order', '\App\Http\Controllers\Frontent\FrontentController@order')->name('frontent.order');
//Route::any('/orders', '\App\Http\Controllers\Frontent\FrontentController@orders')->name('frontent.orders');
//Route::any('/order/{order}', '\App\Http\Controllers\Frontent\FrontentController@orderShow')->name('frontent.order.show');

Route::middleware([\App\Http\Middleware\CheckUser::class])->prefix('frontent')->name('frontent.')->group(function () {
    Route::any('/basket', '\App\Http\Controllers\Frontent\FrontentController@basket')->name('products.basket');
});

Route::middleware([\App\Http\Middleware\CheckUser::class])->name('frontent.')->group(function () {
    Route::any('/order', '\App\Http\Controllers\Frontent\FrontentController@order')->name('order');
    Route::any('/orders', '\App\Http\Controllers\Frontent\FrontentController@orders')->name('orders');
    Route::any('/order/{order}', '\App\Http\Controllers\Frontent\FrontentController@orderShow')->name('order.show');
});

Route::get('/admin/login', '\App\Http\Controllers\Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', '\App\Http\Controllers\Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin/logout', '\App\Http\Controllers\Auth\AdminLoginController@logout')->name('admin.logout');

Route::middleware([\App\Http\Middleware\CheckAdmin::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name("dashboard");

    Route::resource("products",\App\Http\Controllers\Admin\ProductController::class);

    Route::resource("orders",\App\Http\Controllers\Admin\OrderController::class);

    Route::get('/products/confirm/{order}', [\App\Http\Controllers\Admin\OrderController::class, 'confirm'])->name("orders.confirm");

});
