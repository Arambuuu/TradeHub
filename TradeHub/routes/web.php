<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider.
|
*/

// -----------------------------
// Public Pages
// -----------------------------
Route::get('/', function () {
    $products = \App\Models\Product::latest()->take(10)->get();
    $categories = \App\Models\Category::all();

    return Inertia::render('Home', [
        'products' => $products,
        'categories' => $categories,
    ]);
})->name('home');

Route::get('/products', fn () => Inertia::render('Product/Index'))->name('products.index');
Route::get('/product/{id}', fn ($id) => Inertia::render('Product/Show', ['id' => $id]))->name('products.show');
Route::get('/categories/{id}', fn ($id) => Inertia::render('Category/Show', ['id' => $id]))->name('categories.show');

// -----------------------------
// Authentication Pages
// -----------------------------
Route::get('/login', fn () => Inertia::render('Auth/Login'))->name('login');
Route::get('/register', fn () => Inertia::render('Auth/Register'))->name('register');

// -----------------------------
// User Pages (Authenticated)
// -----------------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/cart', fn () => Inertia::render('Cart'))->name('cart');
    Route::get('/checkout', fn () => Inertia::render('Checkout'))->name('checkout');
    Route::get('/orders', fn () => Inertia::render('Orders'))->name('orders.index');
    Route::get('/order/{id}', fn ($id) => Inertia::render('Orders/Show', ['id' => $id]))->name('orders.show');
    Route::get('/profile', fn () => Inertia::render('Profile'))->name('profile');
});

// -----------------------------
// Seller Pages (Authenticated + Seller Role)
// -----------------------------
Route::middleware(['auth', 'role:seller'])->prefix('seller')->name('seller.')->group(function () {
    Route::get('/dashboard', fn () => Inertia::render('Seller/Dashboard'))->name('dashboard');

    Route::get('/products', fn () => Inertia::render('Seller/Products'))->name('products.index');
    Route::get('/products/create', fn () => Inertia::render('Seller/Products/Create'))->name('products.create');
    Route::get('/products/{id}/edit', fn ($id) => Inertia::render('Seller/Products/Edit', ['id' => $id]))->name('products.edit');

    Route::get('/orders', fn () => Inertia::render('Seller/Orders'))->name('orders.index');
    Route::get('/orders/{id}', fn ($id) => Inertia::render('Seller/Orders/Show', ['id' => $id]))->name('orders.show');
});

// -----------------------------
// Admin Pages (Authenticated + Admin Role)
// -----------------------------
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', fn () => Inertia::render('Admin/Dashboard'))->name('dashboard');

    Route::get('/users', fn () => Inertia::render('Admin/Users'))->name('users.index');
    Route::get('/shops', fn () => Inertia::render('Admin/Shops'))->name('shops.index');
    Route::get('/products', fn () => Inertia::render('Admin/Products'))->name('products.index');
    Route::get('/orders', fn () => Inertia::render('Admin/Orders'))->name('orders.index');
});
