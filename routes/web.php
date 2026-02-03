<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
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
    Route::post('/menus', [HomeController::class, 'createmenus'])->name('menu.create');
    Route::post('/hsnfetch', [HomeController::class, 'hsnfetch'])->name('hsnfetch');
    Route::post('/edithsn', [HomeController::class, 'edithsn'])->name('edithsn');
    Route::post('/categoryfetch', [HomeController::class, 'categoryfetch'])->name('categoryfetch');
    Route::post('/editcategory', [HomeController::class, 'editcategory'])->name('editcategory');
    Route::post('/menufetch', [HomeController::class, 'menufetch'])->name('menufetch');
    Route::post('/editmenus', [HomeController::class, 'editmenus'])->name('editmenus');
    Route::post('/shopfetch', [HomeController::class, 'shopfetch'])->name('shopfetch');
    Route::post('/editshop', [HomeController::class, 'editshop'])->name('editshop');
    Route::get('/staff_creation', [HomeController::class, 'staff_creationlist'])->name('staff_creation.list');
    Route::post('/staff_creation', [HomeController::class, 'createstaff_creation'])->name('staff_creation.create');
    Route::post('/stafffetch', [HomeController::class, 'stafffetch'])->name('stafffetch');
    Route::post('/editstaff', [HomeController::class, 'editstaff'])->name('editstaff');
    Route::post('/itemfetch', [HomeController::class, 'itemfetch'])->name('itemfetch');
    Route::post('/edititem', [HomeController::class, 'edititem'])->name('edititem');

    //shops
    
    Route::get('/addshops', [HomeController::class, 'addshops'])->name('addshops');
    
    });



require __DIR__.'/auth.php';
