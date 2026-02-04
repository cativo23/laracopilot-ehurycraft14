<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $items = Item::with('category.menu.restaurant')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        
        return view('admin.items.index', compact('items'));
    }
    
    public function create()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $categories = Category::with('menu.restaurant')->where('active', true)->orderBy('name')->get();
        return view('admin.items.create', compact('categories'));
    }
    
    public function store(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'allergens' => 'nullable|string',
            'available' => 'boolean'
        ]);
        
        $validated['available'] = $request->has('available');
        
        Item::create($validated);
        
        return redirect()->route('admin.items.index')
            ->with('success', 'Item created successfully!');
    }
    
    public function edit($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $item = Item::findOrFail($id);
        $categories = Category::with('menu.restaurant')->where('active', true)->orderBy('name')->get();
        return view('admin.items.edit', compact('item', 'categories'));
    }
    
    public function update(Request $request, $id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $item = Item::findOrFail($id);
        
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'allergens' => 'nullable|string',
            'available' => 'boolean'
        ]);
        
        $validated['available'] = $request->has('available');
        
        $item->update($validated);
        
        return redirect()->route('admin.items.index')
            ->with('success', 'Item updated successfully!');
    }
    
    public function destroy($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        Item::findOrFail($id)->delete();
        
        return redirect()->route('admin.items.index')
            ->with('success', 'Item deleted successfully!');
    }
}