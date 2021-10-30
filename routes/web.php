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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('frontpage');
Route::get('/hotel/{id}', [App\Http\Controllers\FrontendController::class, 'show'])->name('hotel.show');
Route::post('/order/store', [App\Http\Controllers\FrontendController::class, 'store'])->name('order.store');

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function(){
    Route::get('/hotel', [App\Http\Controllers\HotelController::class, 'index'])->name('hotel.index');
    Route::get('/hotel/create', [App\Http\Controllers\HotelController::class, 'create'])->name('hotel.create');
    Route::post('/hotel/store', [App\Http\Controllers\HotelController::class, 'store'])->name('hotel.store');
    Route::get('/hotel/{id}/edit', [App\Http\Controllers\HotelController::class, 'edit'])->name('hotel.edit');
    Route::put('/hotel/{id}/update', [App\Http\Controllers\HotelController::class, 'update'])->name('hotel.update');
    Route::delete('/hotel/{id}/delete', [App\Http\Controllers\HotelController::class, 'destroy'])->name('hotel.destroy');

    Route::get('/user/order', [App\Http\Controllers\UserOrderController::class, 'index'])->name('user.order');
    Route::post('/order/{id}/status', [App\Http\Controllers\UserOrderController::class, 'changeStatus'])->name('order.status');

});

