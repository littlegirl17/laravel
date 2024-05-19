<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

    Route::get('/', [HomeController::class, 'index']);

// ROUTE USER
    Route::get('/register', function () {
        return view('register');
    })->name('register');

    Route::post('/register',[UserController::class, 'register']);


    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::post('/login', [UserController::class, 'login']);

    Route::get('/logout', [UserController::class, 'logout']);

// ROUTE DETAIL CATEGORY & PRODUCT
    Route::get('/category/{slug}',[CategoryController::class, 'index']);

    Route::get('/detail-product/{slug}', [ProductController::class, 'detail'] );

// ROUTE PRODUCT CART
    Route::get('/viewCart', [ProductController::class, 'viewCart']);
    Route::post('/add-to-cart', [ProductController::class, 'addToCart']);
    Route::get('/giam-quantity/{id}', [ProductController::class, 'giamQuantity'])->name('giam');
    Route::get('/tang-quantity/{id}', [ProductController::class, 'tangQuantity'])->name('tang');
    Route::get('/delete-item-cart/{id}', [ProductController::class, 'deleteItemCart'])->name('deleteItem');
    Route::get('/delete-all-cart', [ProductController::class, 'deleteAllCart'])->name('deleteAll');

// ROUTE COMMENT
    Route::post('/add-comment', [ProductController::class, 'comment']);

// ROUTE CHECKOUT
    Route::get('/checkout', [ProductController::class, 'viewcheckout']);

    Route::post('/checkout', [ProductController::class, 'checkout']);

    Route::get('/vieworder', [ProductController::class, 'vieworder']);

    Route::post('/coupon', [ProductController::class, 'couponApply'])->name('coupon');
    Route::get('/delete-coupon', [ProductController::class, 'couponDelete'])->name('couponDelete');

//
Route::get('/search', [AdminController::class, 'search'])->name('search');


// ROTE ADMIN
Route::prefix('admin')->group(function(){

    Route::get('manage', function () {
        return view('admin.login');
    });

    Route::post('manage', [AdminController::class , 'manage']);

    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('category', [AdminController::class , 'category'])->name('category');
    Route::get('addcategory', [AdminController::class , 'categoryAdd'])->name('categoryAdd');
    Route::post('add-category', [AdminController::class , 'categoryAdd']);
    Route::get('edit-category/{id}', [AdminController::class , 'categoryEdit'])->name('categoryEdit');
    Route::put('edit-category/{id}', [AdminController::class , 'categoryUpdate'])->name('categoryUpdate');
    Route::get('delete-category/{id}', [AdminController::class , 'categoryDelete'])->name('categoryDelete');

    Route::get('product', [AdminController::class , 'product'])->name('product');
    Route::get('addproduct', [AdminController::class , 'productAdd'])->name('productAdd');
    Route::post('add-product', [AdminController::class , 'productAdd']);
    Route::get('edit-product/{id}', [AdminController::class , 'productEdit'])->name('productEdit');
    Route::put('edit-product/{id}', [AdminController::class , 'productUpdate'])->name('productUpdate');
    Route::get('delete-product/{id}', [AdminController::class , 'productDelete'])->name('productDelete');
    Route::get('product/{id}/delete-image/{product_id}', [AdminController::class , 'deleteImages'])->name('product.delete-images');

    Route::get('user', [AdminController::class , 'user'])->name('user');
    Route::get('adduser', [AdminController::class , 'userAdd'])->name('userAdd');
    Route::post('add-user', [AdminController::class , 'userAdd']);
    Route::get('edit-user/{id}', [AdminController::class , 'userEdit'])->name('userEdit');
    Route::put('edit-user/{id}', [AdminController::class , 'userUpdate'])->name('userUpdate');
    Route::get('delete-user/{id}', [AdminController::class , 'userDelete'])->name('userDelete');

    Route::get('comment', [AdminController::class , 'comment'])->name('comment');

});