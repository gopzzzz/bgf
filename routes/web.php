<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

    Route::get('/hsnlist', [HomeController::class, 'hsnlist'])->name('hsnlist');
    Route::post('/createhsn', [HomeController::class, 'createhsn'])->name('createhsn');
    Route::get('/category', [HomeController::class, 'categorylist']);
    Route::post('/createcategory', [HomeController::class, 'createcategory'])->name('createcategory');
    Route::get('/item', [HomeController::class, 'itemlist'])->name('item.list');
    Route::post('/item', [HomeController::class, 'createitem'])->name('item.create');
    Route::get('/shop', [HomeController::class, 'shoplist'])->name('shop.list');
    Route::post('/shop', [HomeController::class, 'createshop'])->name('shop.create');
     Route::get('/menus', [HomeController::class, 'menulist'])->name('menu.list');
    Route::post('/hsnfetch', [HomeController::class, 'hsnfetch'])->name('hsnfetch');
       Route::post('/edithsn', [HomeController::class, 'edithsn'])->name('edithsn');

    
    
    
    });



require __DIR__.'/auth.php';
