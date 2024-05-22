<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Page d'Accueil
Route::get('/', 'HomeController@index')->name('home');

// Navbar
Route::view('/contact', 'contact')->name('contact');
Route::get('/cart', 'CartController@index')->name('cart');

// Page de Produits
Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/products/category/{category}', 'ProductController@category')->name('products.category');

// Page de Détail d'un Produit
Route::get('/products/{product}', 'ProductController@show')->name('products.show');

// Page de Panier
Route::post('/cart/add', 'CartController@add')->name('cart.add');
Route::post('/cart/update', 'CartController@update')->name('cart.update');
Route::post('/cart/remove', 'CartController@remove')->name('cart.remove');

// Validation du Panier
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout', 'CheckoutController@process')->name('checkout.process');

// Espace Utilisateur
Auth::routes(); 
Route::get('/user/orders', 'UserController@orders')->name('user.orders')->middleware('auth');

// Accès Administration
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', 'AdminController@index')->name('admin.index');
    Route::resource('/admin/products', 'Admin\ProductController');
    Route::resource('/admin/orders', 'Admin\OrderController');
    Route::resource('/admin/coupons', 'Admin\CouponController');
});
