<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RestaurantApiController;
use App\Http\Controllers\Api\MenuApiController;
use App\Http\Controllers\Api\ItemApiController;

// Public API Endpoints (no authentication required)
Route::prefix('v1')->group(function () {
    // Get restaurant details by subdomain or slug
    Route::get('/restaurants/{slug}', [RestaurantApiController::class, 'show']);
    
    // Get all menus for a restaurant
    Route::get('/restaurants/{slug}/menus', [MenuApiController::class, 'index']);
    
    // Get specific menu with categories and items
    Route::get('/menus/{slug}', [MenuApiController::class, 'show']);
    
    // Get items with optional filters
    Route::get('/items', [ItemApiController::class, 'index']);
    Route::get('/items/{id}', [ItemApiController::class, 'show']);
});

// Protected API Endpoints (require Sanctum authentication)
Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    // Restaurant management endpoints
    Route::apiResource('restaurants', RestaurantApiController::class)->except(['show']);
    Route::apiResource('menus', MenuApiController::class)->except(['index', 'show']);
    Route::apiResource('items', ItemApiController::class)->except(['index', 'show']);
});