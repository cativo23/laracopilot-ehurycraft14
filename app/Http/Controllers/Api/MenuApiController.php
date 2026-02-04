<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Restaurant;

class MenuApiController extends Controller
{
    public function index($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)
            ->orWhere('subdomain', $slug)
            ->where('active', true)
            ->firstOrFail();
        
        $menus = Menu::where('restaurant_id', $restaurant->id)
            ->where('active', true)
            ->get();
        
        return response()->json([
            'success' => true,
            'data' => $menus->map(function ($menu) {
                return [
                    'id' => $menu->id,
                    'name' => $menu->name,
                    'slug' => $menu->slug,
                    'description' => $menu->description,
                    'url' => route('menu.display', $menu->slug)
                ];
            })
        ]);
    }
    
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
        
        return response()->json([
            'success' => true,
            'data' => [
                'id' => $menu->id,
                'name' => $menu->name,
                'slug' => $menu->slug,
                'description' => $menu->description,
                'restaurant' => [
                    'id' => $menu->restaurant->id,
                    'name' => $menu->restaurant->name,
                    'subdomain' => $menu->restaurant->subdomain
                ],
                'categories' => $menu->categories->map(function ($category) {
                    return [
                        'id' => $category->id,
                        'name' => $category->name,
                        'description' => $category->description,
                        'items' => $category->items->map(function ($item) {
                            return [
                                'id' => $item->id,
                                'name' => $item->name,
                                'description' => $item->description,
                                'price' => $item->price,
                                'allergens' => $item->allergens,
                                'available' => $item->available,
                                'modifiers' => $item->modifiers->map(function ($modifier) {
                                    return [
                                        'id' => $modifier->id,
                                        'name' => $modifier->name,
                                        'price' => $modifier->price
                                    ];
                                })
                            ];
                        })
                    ];
                })
            ]
        ]);
    }
}