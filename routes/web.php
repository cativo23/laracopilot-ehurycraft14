<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\ModifierController;
use App\Http\Controllers\MenuDisplayController;

Route::get('/', function () { return view('welcome'); });

// Admin Authentication
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin Dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

// Admin Restaurants
Route::get('/admin/restaurants', [RestaurantController::class, 'index'])->name('admin.restaurants.index');
Route::get('/admin/restaurants/create', [RestaurantController::class, 'create'])->name('admin.restaurants.create');
Route::post('/admin/restaurants', [RestaurantController::class, 'store'])->name('admin.restaurants.store');
Route::get('/admin/restaurants/{id}/edit', [RestaurantController::class, 'edit'])->name('admin.restaurants.edit');
Route::put('/admin/restaurants/{id}', [RestaurantController::class, 'update'])->name('admin.restaurants.update');
Route::delete('/admin/restaurants/{id}', [RestaurantController::class, 'destroy'])->name('admin.restaurants.destroy');

// Admin Menus
Route::get('/admin/menus', [MenuController::class, 'index'])->name('admin.menus.index');
Route::get('/admin/menus/create', [MenuController::class, 'create'])->name('admin.menus.create');
Route::post('/admin/menus', [MenuController::class, 'store'])->name('admin.menus.store');
Route::get('/admin/menus/{id}/edit', [MenuController::class, 'edit'])->name('admin.menus.edit');
Route::put('/admin/menus/{id}', [MenuController::class, 'update'])->name('admin.menus.update');
Route::delete('/admin/menus/{id}', [MenuController::class, 'destroy'])->name('admin.menus.destroy');
Route::get('/admin/menus/{id}/qrcode', [MenuController::class, 'generateQRCode'])->name('admin.menus.qrcode');

// Admin Categories
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
Route::put('/admin/categories/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

// Admin Items
Route::get('/admin/items', [ItemController::class, 'index'])->name('admin.items.index');
Route::get('/admin/items/create', [ItemController::class, 'create'])->name('admin.items.create');
Route::post('/admin/items', [ItemController::class, 'store'])->name('admin.items.store');
Route::get('/admin/items/{id}/edit', [ItemController::class, 'edit'])->name('admin.items.edit');
Route::put('/admin/items/{id}', [ItemController::class, 'update'])->name('admin.items.update');
Route::delete('/admin/items/{id}', [ItemController::class, 'destroy'])->name('admin.items.destroy');

// Admin Modifiers
Route::get('/admin/modifiers', [ModifierController::class, 'index'])->name('admin.modifiers.index');
Route::get('/admin/modifiers/create', [ModifierController::class, 'create'])->name('admin.modifiers.create');
Route::post('/admin/modifiers', [ModifierController::class, 'store'])->name('admin.modifiers.store');
Route::get('/admin/modifiers/{id}/edit', [ModifierController::class, 'edit'])->name('admin.modifiers.edit');
Route::put('/admin/modifiers/{id}', [ModifierController::class, 'update'])->name('admin.modifiers.update');
Route::delete('/admin/modifiers/{id}', [ModifierController::class, 'destroy'])->name('admin.modifiers.destroy');

// Public Menu Display
Route::get('/menu/{slug}', [MenuDisplayController::class, 'show'])->name('menu.display');