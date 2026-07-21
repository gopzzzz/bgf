<?php
use App\Http\Controllers\ItemwiseReportController;
 use App\Http\Controllers\SalesReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\PurchaseReportController;

=======
use App\Http\Controllers\MaterialPurchaseOrderController;
>>>>>>> 3e06839637a3a9b54a52a9df37b6080dbcbd8cd1

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
    Route::post('/shop/create', [HomeController::class, 'createshop'])->name('shop.create');
    Route::get('/menus', [HomeController::class, 'menulist'])->name('menu.list');
    Route::post('/menus', [HomeController::class, 'createmenus'])->name('menu.create');
    Route::post('/hsnfetch', [HomeController::class, 'hsnfetch'])->name('hsnfetch');
    Route::post('/edithsn', [HomeController::class, 'edithsn'])->name('edithsn');
    Route::post('/categoryfetch', [HomeController::class, 'categoryfetch'])->name('categoryfetch');
    Route::post('/editcategory', [HomeController::class, 'editcategory'])->name('editcategory');
    Route::post('/menufetch', [HomeController::class, 'menufetch'])->name('menufetch');
    Route::post('/editmenus', [HomeController::class, 'editmenus'])->name('editmenus');
    Route::get('/shop/{id}/edit', [HomeController::class, 'editshop'])->name('shop.edit');
    Route::put('/shop/{id}', [HomeController::class, 'updateshop'])->name('shop.update');
    Route::get('/staff_creation', [HomeController::class, 'staff_creationlist'])->name('staff_creation.list');
    Route::post('/staff_creation', [HomeController::class, 'createstaff_creation'])->name('staff_creation.create');
    Route::post('/stafffetch', [HomeController::class, 'stafffetch'])->name('stafffetch');
    Route::post('/editstaff', [HomeController::class, 'editstaff'])->name('editstaff');
    Route::post('/itemfetch', [HomeController::class, 'itemfetch'])->name('itemfetch');
    Route::post('/edititem', [HomeController::class, 'edititem'])->name('edititem');
    Route::get('/createbill', [HomeController::class, 'createbill'])->name('createbill');


    Route::get('/brandlist', [HomeController::class, 'brandlist'])->name('brandlist');
    Route::post('/createbrand', [HomeController::class, 'createbrand'])->name('createbrand');
    Route::get('/materials', [HomeController::class, 'materiallist'])->name('materials');
    Route::post('/materialfetch', [HomeController::class, 'materialfetch'])->name('materialfetch');
    
    Route::post('/generatebill', [HomeController::class, 'generatebill'])->name('generatebill');
     Route::post('/editmaterials', [HomeController::class, 'editmaterials'])->name('editmaterials');

     

    //shops
    
    Route::get('/addshops', [HomeController::class, 'addshops'])->name('addshops');

   
    Route::get('/sales-report', [SalesReportController::class, 'index']);

    

    Route::get('/itemwise-report', [ItemwiseReportController::class, 'index']);

    Route::get('/purchase-report', [PurchaseReportController::class, 'index']);

    



Route::get('/materialpurchaseorder', [MaterialPurchaseOrderController::class, 'index'])
    ->name('materialpurchaseorder');

    
    
    });
   

require __DIR__.'/auth.php';

