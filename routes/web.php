<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
Route::get('/', [CategoryController::class, 'show'])->name('homePage');

use App\Http\Controllers\SubCategoryController;
Route::get('/category/{category}', [SubCategoryController::class, 'show'])->where('category', '[a-zA-Zа-яА-Я]+');

use App\Http\Controllers\AdController;
Route::get('/subcategory/{subcategory}', [AdController::class, 'showAll'])->where('subcategory', '[a-zA-Zа-яА-Я]+');
Route::post('/subcategory/{subcategory}', [AdController::class, 'insert'])->where('subcategory', '[a-zA-Zа-яА-Я]+');


use App\Http\Controllers\UserController;
Route::group(['middleware' => 'guest'], function (){
    Route::match(['get', 'post'], '/register', [UserController::class, 'registerForm']);
    Route::match(['get', 'post'], '/login', [UserController::class, 'loginForm'])->name('login');
});
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

use App\Http\Controllers\AdminController;
Route::group(['middleware' => 'admin'], function (){
    Route::get('/admin', [AdminController::class, 'showAll']);
    Route::get('/view-ad/{id}', [AdminController::class, 'showOneAd'])->where('id', '\d+');
    Route::post('/view-ad/{id}', [AdminController::class, 'changeAdActive'])->where('id', '\d+');
    Route::get('/edit-user/{id}', [AdminController::class, 'showUser'])->where('id', '\d+');
    Route::post('/edit-user/{id}', [AdminController::class, 'editUser'])->where('id', '\d+');
});



