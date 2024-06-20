<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CouponController;



// Page d'Accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// Navbar
Route::view('/contact', 'contact')->name('contact');
Route::get('/cart', [CartController::class, 'index'])->name('cart');

// Page de Produits

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');


Route::get('/products/category/{category}', [ProductController::class, 'category'])->name('products.category');

// Page de Détail d'un Produit
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
// Page de Panier

Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/add/{id}/{quantity}', [CartController::class, 'add'])->name('cart.add');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Validation du Panier
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');

// Formualaire de contact
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

// Espace Utilisateur
Auth::routes();
Route::get('/user/orders', [UserController::class, 'orders'])->name('user.orders')->middleware('auth');
Route::get('/user/orders/{id}', [UserController::class, 'orderDetails'])->name('user.order.details')->middleware('auth');

// Coupon dans le checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/applyCoupon', [CheckoutController::class, 'applyCoupon'])->name('checkout.applyCoupon');
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');

Route::middleware(['auth'])->group(function () {
    Route::get('/user/orders', [UserController::class, 'orders'])->name('user.orders');
    Route::get('/user/orders/{id}', [UserController::class, 'orderDetails'])->name('user.order.details');
});

Route::get('admin/products', [AdminController::class, 'index'])->name('admin.index');
Route::get('admin/products/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('admin/products', [AdminController::class, 'store'])->name('admin.store');
Route::get('admin/products/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('admin/products/{id}', [AdminController::class, 'update'])->name('admin.update');
Route::delete('admin/products/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

Route::get('admin/coupons', [CouponController::class, 'index'])->name('admin.coupons.index');
Route::get('admin/coupons/create', [CouponController::class, 'create'])->name('admin.coupons.create');
Route::post('admin/coupons', [CouponController::class, 'store'])->name('admin.coupons.store');
Route::get('admin/coupons/{id}/edit', [CouponController::class, 'edit'])->name('admin.coupons.edit');
Route::put('admin/coupons/{id}', [CouponController::class, 'update'])->name('admin.coupons.update');
Route::delete('admin/coupons/{id}', [CouponController::class, 'destroy'])->name('admin.coupons.destroy');
