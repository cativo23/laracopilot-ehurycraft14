<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MenuFlow Admin - @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <aside class="w-64 bg-gradient-to-b from-slate-800 to-slate-900 text-white flex-shrink-0">
            <div class="p-6 border-b border-slate-700">
                <h1 class="text-2xl font-bold">MenuFlow</h1>
                <p class="text-sm text-gray-400 mt-1">Admin Panel</p>
            </div>
            <nav class="p-4">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-slate-700 transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-slate-700' : '' }}">
                    <span class="mr-3">📊</span> Dashboard
                </a>
                <a href="{{ route('admin.restaurants.index') }}" class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-slate-700 transition-all duration-200 {{ request()->routeIs('admin.restaurants.*') ? 'bg-slate-700' : '' }}">
                    <span class="mr-3">🏢</span> Restaurants
                </a>
                <a href="{{ route('admin.menus.index') }}" class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-slate-700 transition-all duration-200 {{ request()->routeIs('admin.menus.*') ? 'bg-slate-700' : '' }}">
                    <span class="mr-3">📋</span> Menus
                </a>
                <a href="{{ route('admin.categories.index') }}" class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-slate-700 transition-all duration-200 {{ request()->routeIs('admin.categories.*') ? 'bg-slate-700' : '' }}">
                    <span class="mr-3">📁</span> Categories
                </a>
                <a href="{{ route('admin.items.index') }}" class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-slate-700 transition-all duration-200 {{ request()->routeIs('admin.items.*') ? 'bg-slate-700' : '' }}">
                    <span class="mr-3">🍽️</span> Menu Items
                </a>
                <a href="{{ route('admin.modifiers.index') }}" class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-slate-700 transition-all duration-200 {{ request()->routeIs('admin.modifiers.*') ? 'bg-slate-700' : '' }}">
                    <span class="mr-3">➕</span> Modifiers
                </a>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">@yield('title', 'Dashboard')</h2>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-gray-600">Welcome, <strong>{{ session('admin_user') }}</strong></span>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-all duration-200">Logout</button>
                    </form>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-6">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
