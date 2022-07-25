<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleryCantroller;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\VideoGalleryController;
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


Route::group(['middleware'=>['auth:sanctum', 'verified']], function(){
    Route::name('dashboard.')->prefix('dashboard')->group(function(){
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::resource('product', ProductController::class);
        Route::resource('category', ProductCategoryController::class);
        Route::resource('product.gallery', ProductGalleryController::class)->shallow()->only([
            'index', 'create', 'store', 'destroy'
        ]);
        Route::resource('product.vidio', VideoGalleryController::class)->shallow()->only([
            'index', 'create', 'store', 'destroy'
        ]);
    });
});
Route::get('/', function () {
    return view('auth.login');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
// });
