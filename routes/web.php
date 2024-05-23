<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\CouponController as AdminCouponController;

// Page d'Accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// Navbar
Route::view('/contact', 'contact')->name('contact');
Route::get('/cart', [CartController::class, 'index'])->name('cart');

// Page de Produits
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/category/{category}', [ProductController::class, 'category'])->name('products.category');

// Page de Détail d'un Produit
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Page de Panier
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

// Validation du Panier
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');

// Espace Utilisateur
Auth::routes(); 
Route::get('/user/orders', [UserController::class, 'orders'])->name('user.orders')->middleware('auth');

// Accès Administration
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('/admin/products', AdminProductController::class);
    Route::resource('/admin/orders', AdminOrderController::class);
    Route::resource('/admin/coupons', AdminCouponController::class);
});