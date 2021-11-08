<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Web\WebPorductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminAuthenticationController;
use App\Http\Controllers\Admin\ProductReviewController;

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

    // product review
    Route::get('product-reviews-approve/{id}', [ProductReviewController::class,'approve'])->name('product-reviews');
    Route::get('product-reviews', [ProductReviewController::class,'index'])->name('product-reviews');


    // product
    route::get('product/delete-data/{id}', [ProductController::class,'deleteData']);
    route::get('product-deatils/{id}', [ProductController::class,'productDetails']);
    route::post('product-details', [ProductController::class,'productDetailUpdate'])->name('product_details.update');
    Route::resource('product',ProductController::class);
  
});

route::get('product-details/{slug}', [WebPorductController::class,'productDetailsPage'])->name('product-details.slug');

Route::group(['middleware' => 'is_user'],function () {
    Route::post('submit-reveiw', [WebPorductController::class,'submitReview']);
  
});