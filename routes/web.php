<?php

use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\Users\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);


Route::middleware(['auth'])->group(function () {


    Route::prefix('admin')->group(function () {
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);

        //Menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create'])->name( 'add');
            Route::get('list', [MenuController::class, 'index'])->name( 'list');

        });
    });


});
