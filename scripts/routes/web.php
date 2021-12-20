<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('frontend.home');
Route::get('/product-detail', [App\Http\Controllers\Frontend\FrontendController::class, 'product_detail'])->name('frontend.product_detail');
Route::get('/shopping-cart', [App\Http\Controllers\Frontend\FrontendController::class, 'shopping_cart'])->name('frontend.shopping_cart');
Route::get('/contact-us', [App\Http\Controllers\Frontend\FrontendController::class, 'contact_us'])->name('frontend.contact_us');
Route::post('/contact-us', [App\Http\Controllers\Frontend\EmailController::class, 'email_send'])->name('frontend.contact_us.store');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware'=>'auth'],function () {

    Route::prefix('users')->group(function(){
        Route::get('/view',[\App\Http\Controllers\Admin\UserController::class,'index'])->name('users.view');
        Route::get('/create',[\App\Http\Controllers\Admin\UserController::class,'create'])->name('users.create');
        Route::post('/create',[\App\Http\Controllers\Admin\UserController::class,'store'])->name('users.store');
        Route::put('/update/{id}',[\App\Http\Controllers\Admin\UserController::class,'update'])->name('users.update');
        Route::get('/delete/{id}',[\App\Http\Controllers\Admin\UserController::class,'destroy'])->name('users.delete');
    });

    Route::prefix('profiles')->group(function(){
        Route::get('/view',[\App\Http\Controllers\Admin\ProfileController::class,'index'])->name('profiles.view');
        Route::get('/edit',[\App\Http\Controllers\Admin\ProfileController::class,'edit'])->name('profiles.edit');
        Route::post('/update',[\App\Http\Controllers\Admin\ProfileController::class,'update'])->name('profiles.update');
        Route::get('/change-password',[\App\Http\Controllers\Admin\ProfileController::class,'passworView'])->name('profiles.change-password');
        Route::post('/change-password/update',[\App\Http\Controllers\Admin\ProfileController::class,'passworUpdate'])->name('profiles.change-password.update');
    });

    Route::prefix('communicates')->group(function(){
        Route::get('/view',[\App\Http\Controllers\Admin\CommunicateController::class,'index'])->name('communicates.view');
        Route::get('/delete/{id}',[\App\Http\Controllers\Admin\CommunicateController::class,'destroy'])->name('communicates.delete');
    });


    Route::prefix('logos')->group(function(){
        Route::get('/view',[\App\Http\Controllers\Admin\LogoController::class,'index'])->name('logos.view');
        Route::get('/create',[\App\Http\Controllers\Admin\LogoController::class,'create'])->name('logos.create');
        Route::post('/create',[\App\Http\Controllers\Admin\LogoController::class,'store'])->name('logos.store');
        Route::get('/edit/{id}',[\App\Http\Controllers\Admin\LogoController::class,'edit'])->name('logos.edit');
        Route::post('/update/{id}',[\App\Http\Controllers\Admin\LogoController::class,'update'])->name('logos.update');
        Route::get('/delete/{id}',[\App\Http\Controllers\Admin\LogoController::class,'destroy'])->name('logos.delete');
    });
});
