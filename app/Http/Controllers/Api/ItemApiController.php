<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemApiController extends Controller
{
    public function index(Request $request)
    {
        $query = Item::with(['category.menu.restaurant', 'modifiers'])
            ->where('available', true);
        
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        
        $items = $query->get();
        
        return response()->json([
            'success' => true,
            'data' => $items->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'description' => $item->description,
                    'price' => $item->price,
                    'allergens' => $item->allergens,
                    'category' => [
                        'id' => $item->category->id,
                        'name' => $item->category->name
                    ],
                    'modifiers' => $item->modifiers->map(function ($modifier) {
                        return [
                            'id' => $modifier->id,
                            'name' => $modifier->name,
                            'price' => $modifier->price
                        ];
                    })
                ];
            })
        ]);
    }
    
    public function show($id)
    {
        $item = Item::with(['category.menu.restaurant', 'modifiers'])
            ->where('available', true)
            ->findOrFail($id);
        
        return response()->json([
            'success' => true,
            'data' => [
                'id' => $item->id,
                'name' => $item->name,
                'description' => $item->description,
                'price' => $item->price,
                'allergens' => $item->allergens,
                'available' => $item->available,
                'category' => [
                    'id' => $item->category->id,
                    'name' => $item->category->name,
                    'menu' => [
                        'id' => $item->category->menu->id,
                        'name' => $item->category->menu->name
                    ]
                ],
                'modifiers' => $item->modifiers->map(function ($modifier) {
                    return [
                        'id' => $modifier->id,
                        'name' => $modifier->name,
                        'price' => $modifier->price,
                        'available' => $modifier->available
                    ];
                })
            ]
        ]);
    }
}