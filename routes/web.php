<?php

use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Services\UploadService;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserProfileController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'stores']);
Route::get('admin/users/logout', [LoginController::class, 'logout_Admin'])->name('logouts');



Route::middleware(['auth'])->group(function () {


    Route::prefix('admin')->group(function () {
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);


        //Menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create_menu']);
            Route::post('add', [MenuController::class, 'store_menu']);


            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show_menu']);
            Route::post('edit/{menu}', [MenuController::class, 'update_menu']);
            Route::delete('destroy', [MenuController::class, 'destroy_menu']);

        });

        //Product
        Route::prefix('products')->group(function(){
            Route::get('add', [ProductController::class, 'create_product']);
            Route::post('add', [ProductController::class, 'store_product']);
            Route::get('list', [ProductController::class, 'index'])->name('product_list');
            Route::get('edit/{product}', [ProductController::class, 'show_product']);
            Route::post('edit/{product}', [ProductController::class, 'update_product']);
            Route::delete('destroy', [ProductController::class, 'destroy_product']);
        });

         //Slider
         Route::prefix('sliders')->group(function(){
            Route::get('add', [SliderController::class, 'create_slider']);
            Route::post('add', [SliderController::class, 'store_slider']);
            Route::get('list', [SliderController::class, 'index']);
            Route::get('edit/{slider}', [SliderController::class, 'show_slider']);
            Route::post('edit/{slider}', [SliderController::class, 'update_slider']);
            Route::delete('destroy', [SliderController::class, 'destroy_slider']);
        });

        //Upload
        Route::post('upload/services', [UploadController::class, 'store']);

        //Cart
        Route::get('customers', [\App\Http\Controllers\Admin\CartController::class, 'index']);
        Route::get('customers/view/{customer}', [\App\Http\Controllers\Admin\CartController::class, 'show_cart']);
        Route::delete('customers/destroy', [\App\Http\Controllers\Admin\CartController::class, 'destroy_cart']);

        //user
        Route::prefix('/users/users')->group(function(){
            Route::get('add', [UserController::class, 'create_user']);
            Route::post('add', [UserController::class, 'store_user']);
            Route::get('list', [UserController::class, 'index'])->name('admin.users.users.list');
            Route::get('edit/{user}', [UserController::class, 'show_user']);
            Route::post('edit/{user}', [UserController::class, 'update_user']);
            Route::delete('destroy', [UserController::class, 'destroy_user']);
        });
    });


});


Route::get('/', [App\Http\Controllers\MainController::class, 'index']);
Route::post('/services/load-product', [App\Http\Controllers\MainController::class, 'loadProduct']);

Route::get('categories/{id}-{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
Route::get('products/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);
Route::get('/search', [App\Http\Controllers\ProductController::class, 'search_Product'])->name('product.search');


Route::post('add-cart', [App\Http\Controllers\CartController::class, 'index']);
Route::get('carts', [App\Http\Controllers\CartController::class, 'show_Cart']);
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'update_Cart']);
Route::get('carts/delete/{id}', [App\Http\Controllers\CartController::class, 'remove_Cart']);
Route::post('carts', [App\Http\Controllers\CartController::class, 'addCart']);

Route::get('login', [PagesController::class, 'index'])->name(name: 'login');
Route::post('login/store', [PagesController::class, 'store'])->name('login.store');
Route::get('/logout', [PagesController::class, 'logout'])->name('logout');

Route::get('/profile', [UserProfileController::class, 'index'])->name('profile');
Route::post('/profile/update', [UserProfileController::class, 'update'])->name('profile.update');

Route::middleware('guest')->get('/register', [PagesController::class, 'showRegisterForm'])->name('register.form');
Route::middleware('guest')->post('/register', [PagesController::class, 'register'])->name('register');
