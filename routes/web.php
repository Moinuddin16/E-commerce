<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminAuthenticationController;
use App\Http\Controllers\Web\HomeController;

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
Route::get('/',[HomeController::class,'index'])->name('home');


Auth::routes();
Route::get('admin/login', [AdminAuthenticationController::class,'login']);
Route::group(['prefix' => 'admin' ,'middleware' => 'is_admin'],function () {
    Route::get('dashboard', [DashboardController::class,'index']);

    // product
    route::get('product/delete-data/{id}', [ProductController::class,'deleteData']);
    route::get('product-deatils/{id}', [ProductController::class,'productDetails']);
    route::post('product-details', [ProductController::class,'productDetailUpdate'])->name('product_details.update');
    Route::resource('product',ProductController::class);
  
});

