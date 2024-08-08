<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'isadmin', 'verified'])->group(function () {






    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('admin.index');


    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

    //product crud

    Route::get('/product', [ProductController::class, 'index'])->name('admin.product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('product/store', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');

    //order crud
    Route::get('/order', [AdminController::class, 'index'])->name('admin.order');
    Route::get('/order/accept/{id}', [AdminController::class, 'acceptorder'])->name('admin.order.accept');
    Route::get('/order/reject/{id}', [AdminController::class, 'rejectorder'])->name('admin.order.reject');

    //payment crud
    Route::get('/payment', [AdminController::class, 'payment'])->name('admin.payment');

    //user
    Route::get('/user', [AdminController::class, 'user'])->name('admin.user');
});


Route::middleware(['auth', 'isuser', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //cart routes
    Route::get('/productdetails/{id}', [PageController::class, 'productdetails'])->name('user.productdetails');
    Route::post('productdetails/store', [CartController::class, 'store'])->name('productdetails.store');


    Route::get('/cart', [CartController::class, 'index'])->name('user.cart');
    Route::get('/cart/destroy/{id}', [CartController::class, 'destroy'])->name('user.cart.destroy');
    Route::post('cart/update/{id}', [CartController::class, 'update'])->name('user.cart.update');


    Route::get('/checkout', [PageController::class, 'checkout'])->name('user.checkout');

    //order routes
    Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

    //payment routes    
    Route::get('/payment/esewa/success', [PaymentController::class, 'esewasuccess'])->name('esewa.success');
    Route::get('/payment/esewa/fail', [PaymentController::class, 'esewafail'])->name('esewa.fail');

    //order history
    Route::get('/orderhistory',[OrderController::class,'history'])->name('user.orderhistory');
    Route::get('/ordercancel/{id}',[OrderController::class,'cancleorder'])->name('user.ordercancel');
    Route::get('/orderproduct/{id}',[OrderController::class,'orderproduct'])->name('user.orderproduct');
    Route::get('/deleteorder/{id}',[OrderController::class,'deleteorder'])->name('user.deleteorder');

   
});
Route::get('/categorysearch/{id}', [PageController::class, 'categorysearch'])->name('user.categorysearch');
Route::get('/search', [PageController::class, 'search'])->name('user.search');

Route::get('/aboutus',[PageController::class,'aboutus'])->name('user.aboutus');



//visitor routes and able to access by all
Route::get('/', [PageController::class, 'index'])->name('user.index');
Route::get('/shop', [PageController::class, 'shop'])->name('user.shop');











require __DIR__ . '/auth.php';
