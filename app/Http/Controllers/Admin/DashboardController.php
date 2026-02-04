<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Menu;
use App\Models\Item;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $totalRestaurants = Restaurant::count();
        $activeRestaurants = Restaurant::where('active', true)->count();
        $totalMenus = Menu::count();
        $totalItems = Item::count();
        $availableItems = Item::where('available', true)->count();
        $totalCategories = Category::count();
        
        $recentRestaurants = Restaurant::with('menus')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        $recentMenus = Menu::with('restaurant')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        return view('admin.dashboard', compact(
            'totalRestaurants',
            'activeRestaurants',
            'totalMenus',
            'totalItems',
            'availableItems',
            'totalCategories',
            'recentRestaurants',
            'recentMenus'
        ));
    }
}