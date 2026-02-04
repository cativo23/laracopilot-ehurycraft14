@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-semibold uppercase">Total Restaurants</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalRestaurants }}</p>
                <p class="text-sm text-green-600 mt-1">{{ $activeRestaurants }} active</p>
            </div>
            <div class="text-5xl">🏢</div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-semibold uppercase">Total Menus</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalMenus }}</p>
            </div>
            <div class="text-5xl">📋</div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-semibold uppercase">Menu Items</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalItems }}</p>
                <p class="text-sm text-green-600 mt-1">{{ $availableItems }} available</p>
            </div>
            <div class="text-5xl">🍽️</div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Recent Restaurants</h3>
        <div class="space-y-3">
            @forelse($recentRestaurants as $restaurant)
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div>
                        <p class="font-semibold text-gray-800">{{ $restaurant->name }}</p>
                        <p class="text-sm text-gray-600">{{ $restaurant->menus_count }} menus</p>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $restaurant->active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $restaurant->active ? 'Active' : 'Inactive' }}
                    </span>
                </div>
            @empty
                <p class="text-gray-500 text-center py-4">No restaurants yet</p>
            @endforelse
        </div>
        <a href="{{ route('admin.restaurants.index') }}" class="block text-center mt-4 text-blue-600 hover:underline">View All Restaurants →</a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Recent Menus</h3>
        <div class="space-y-3">
            @forelse($recentMenus as $menu)
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div>
                        <p class="font-semibold text-gray-800">{{ $menu->name }}</p>
                        <p class="text-sm text-gray-600">{{ $menu->restaurant->name }}</p>
                    </div>
                    <a href="{{ route('admin.menus.qrcode', $menu->id) }}" class="px-3 py-1 bg-blue-600 text-white rounded text-xs hover:bg-blue-700">QR Code</a>
                </div>
            @empty
                <p class="text-gray-500 text-center py-4">No menus yet</p>
            @endforelse
        </div>
        <a href="{{ route('admin.menus.index') }}" class="block text-center mt-4 text-blue-600 hover:underline">View All Menus →</a>
    </div>
</div>
@endsection
