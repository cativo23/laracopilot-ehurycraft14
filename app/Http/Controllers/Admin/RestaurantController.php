<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RestaurantController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $restaurants = Restaurant::withCount('menus')
            ->orderBy('created_at', 'desc')
            ->paginate(12);
        
        return view('admin.restaurants.index', compact('restaurants'));
    }
    
    public function create()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        return view('admin.restaurants.create');
    }
    
    public function store(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subdomain' => 'required|string|max:63|unique:restaurants,subdomain|alpha_dash',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'active' => 'boolean'
        ]);
        
        $validated['slug'] = Str::slug($validated['name']);
        $validated['active'] = $request->has('active');
        
        Restaurant::create($validated);
        
        return redirect()->route('admin.restaurants.index')
            ->with('success', 'Restaurant created successfully!');
    }
    
    public function edit($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $restaurant = Restaurant::findOrFail($id);
        return view('admin.restaurants.edit', compact('restaurant'));
    }
    
    public function update(Request $request, $id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $restaurant = Restaurant::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subdomain' => 'required|string|max:63|alpha_dash|unique:restaurants,subdomain,' . $id,
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'active' => 'boolean'
        ]);
        
        $validated['slug'] = Str::slug($validated['name']);
        $validated['active'] = $request->has('active');
        
        $restaurant->update($validated);
        
        return redirect()->route('admin.restaurants.index')
            ->with('success', 'Restaurant updated successfully!');
    }
    
    public function destroy($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        Restaurant::findOrFail($id)->delete();
        
        return redirect()->route('admin.restaurants.index')
            ->with('success', 'Restaurant deleted successfully!');
    }
}