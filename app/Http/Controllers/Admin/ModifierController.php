<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Modifier;
use App\Models\Item;
use Illuminate\Http\Request;

class ModifierController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $modifiers = Modifier::with('items')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        
        return view('admin.modifiers.index', compact('modifiers'));
    }
    
    public function create()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $items = Item::with('category')->where('available', true)->orderBy('name')->get();
        return view('admin.modifiers.create', compact('items'));
    }
    
    public function store(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'available' => 'boolean',
            'items' => 'nullable|array',
            'items.*' => 'exists:items,id'
        ]);
        
        $validated['available'] = $request->has('available');
        
        $modifier = Modifier::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'available' => $validated['available']
        ]);
        
        if (isset($validated['items'])) {
            $modifier->items()->attach($validated['items']);
        }
        
        return redirect()->route('admin.modifiers.index')
            ->with('success', 'Modifier created successfully!');
    }
    
    public function edit($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $modifier = Modifier::with('items')->findOrFail($id);
        $items = Item::with('category')->where('available', true)->orderBy('name')->get();
        return view('admin.modifiers.edit', compact('modifier', 'items'));
    }
    
    public function update(Request $request, $id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $modifier = Modifier::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'available' => 'boolean',
            'items' => 'nullable|array',
            'items.*' => 'exists:items,id'
        ]);
        
        $validated['available'] = $request->has('available');
        
        $modifier->update([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'available' => $validated['available']
        ]);
        
        if (isset($validated['items'])) {
            $modifier->items()->sync($validated['items']);
        } else {
            $modifier->items()->detach();
        }
        
        return redirect()->route('admin.modifiers.index')
            ->with('success', 'Modifier updated successfully!');
    }
    
    public function destroy($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $modifier = Modifier::findOrFail($id);
        $modifier->items()->detach();
        $modifier->delete();
        
        return redirect()->route('admin.modifiers.index')
            ->with('success', 'Modifier deleted successfully!');
    }
}