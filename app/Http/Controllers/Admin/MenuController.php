<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MenuController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $menus = Menu::with('restaurant')
            ->orderBy('created_at', 'desc')
            ->paginate(12);
        
        return view('admin.menus.index', compact('menus'));
    }
    
    public function create()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $restaurants = Restaurant::where('active', true)->orderBy('name')->get();
        return view('admin.menus.create', compact('restaurants'));
    }
    
    public function store(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $validated = $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'active' => 'boolean'
        ]);
        
        $validated['slug'] = Str::slug($validated['name']) . '-' . time();
        $validated['active'] = $request->has('active');
        
        Menu::create($validated);
        
        return redirect()->route('admin.menus.index')
            ->with('success', 'Menu created successfully!');
    }
    
    public function edit($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $menu = Menu::findOrFail($id);
        $restaurants = Restaurant::where('active', true)->orderBy('name')->get();
        return view('admin.menus.edit', compact('menu', 'restaurants'));
    }
    
    public function update(Request $request, $id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $menu = Menu::findOrFail($id);
        
        $validated = $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'active' => 'boolean'
        ]);
        
        $validated['active'] = $request->has('active');
        
        $menu->update($validated);
        
        return redirect()->route('admin.menus.index')
            ->with('success', 'Menu updated successfully!');
    }
    
    public function destroy($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        Menu::findOrFail($id)->delete();
        
        return redirect()->route('admin.menus.index')
            ->with('success', 'Menu deleted successfully!');
    }
    
    public function generateQRCode($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $menu = Menu::findOrFail($id);
        $url = route('menu.display', $menu->slug);
        
        $qrCode = QrCode::size(300)
            ->format('png')
            ->generate($url);
        
        return view('admin.menus.qrcode', compact('menu', 'qrCode', 'url'));
    }
}