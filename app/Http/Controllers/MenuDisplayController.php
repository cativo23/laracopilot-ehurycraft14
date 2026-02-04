<?php

namespace App\Http\Controllers;

use App\Models\Menu;

class MenuDisplayController extends Controller
{
    public function show($slug)
    {
        $menu = Menu::where('slug', $slug)
            ->where('active', true)
            ->with([
                'restaurant',
                'categories' => function ($query) {
                    $query->where('active', true)->orderBy('sort_order');
                },
                'categories.items' => function ($query) {
                    $query->where('available', true);
                },
                'categories.items.modifiers' => function ($query) {
                    $query->where('available', true);
                }
            ])
            ->firstOrFail();
        
        return view('menu-display', compact('menu'));
    }
}