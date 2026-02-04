<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantApiController extends Controller
{
    public function show($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)
            ->orWhere('subdomain', $slug)
            ->where('active', true)
            ->with(['menus' => function ($query) {
                $query->where('active', true);
            }])
            ->firstOrFail();
        
        return response()->json([
            'success' => true,
            'data' => [
                'id' => $restaurant->id,
                'name' => $restaurant->name,
                'slug' => $restaurant->slug,
                'subdomain' => $restaurant->subdomain,
                'email' => $restaurant->email,
                'phone' => $restaurant->phone,
                'address' => $restaurant->address,
                'description' => $restaurant->description,
                'menus' => $restaurant->menus->map(function ($menu) {
                    return [
                        'id' => $menu->id,
                        'name' => $menu->name,
                        'slug' => $menu->slug,
                        'description' => $menu->description
                    ];
                })
            ]
        ]);
    }
}