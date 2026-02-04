<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MenuFlow - Headless Menu CMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-900 to-slate-800 min-h-screen">
    <nav class="bg-slate-800/50 backdrop-blur-sm border-b border-slate-700">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="text-white text-2xl font-bold">MenuFlow</div>
            <a href="{{ route('admin.login') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-all duration-300">Admin Login</a>
        </div>
    </nav>

    <section class="max-w-7xl mx-auto px-4 py-20 text-center">
        <div class="mb-8">
            <h1 class="text-6xl font-bold text-white mb-6">Headless Menu CMS for Modern Restaurants</h1>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">Multi-tenant SaaS platform where restaurants manage menus while developers consume data via lightning-fast JSON APIs. Backend-as-a-Service for design agencies.</p>
        </div>
        <div class="flex gap-4 justify-center">
            <a href="{{ route('admin.login') }}" class="bg-blue-600 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-blue-700 transition-all duration-300 transform hover:scale-105">Get Started</a>
            <a href="#features" class="bg-slate-700 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-slate-600 transition-all duration-300">Learn More</a>
        </div>
    </section>

    <section id="features" class="max-w-7xl mx-auto px-4 py-20">
        <h2 class="text-4xl font-bold text-white text-center mb-12">Platform Features</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-slate-800/50 backdrop-blur-sm p-8 rounded-xl border border-slate-700">
                <div class="text-blue-500 text-4xl mb-4">🏢</div>
                <h3 class="text-xl font-bold text-white mb-3">Multi-Tenancy</h3>
                <p class="text-gray-400">Isolate restaurant data with custom subdomains. Each restaurant gets their own secure workspace.</p>
            </div>
            <div class="bg-slate-800/50 backdrop-blur-sm p-8 rounded-xl border border-slate-700">
                <div class="text-blue-500 text-4xl mb-4">⚡</div>
                <h3 class="text-xl font-bold text-white mb-3">API-First Architecture</h3>
                <p class="text-gray-400">Secure REST endpoints via Laravel Sanctum with Swagger documentation for easy integration.</p>
            </div>
            <div class="bg-slate-800/50 backdrop-blur-sm p-8 rounded-xl border border-slate-700">
                <div class="text-blue-500 text-4xl mb-4">📱</div>
                <h3 class="text-xl font-bold text-white mb-3">QR Code Menus</h3>
                <p class="text-gray-400">Auto-generated QR codes for instant mobile-optimized menu access. No app required.</p>
            </div>
            <div class="bg-slate-800/50 backdrop-blur-sm p-8 rounded-xl border border-slate-700">
                <div class="text-blue-500 text-4xl mb-4">🔄</div>
                <h3 class="text-xl font-bold text-white mb-3">Real-Time Updates</h3>
                <p class="text-gray-400">Laravel Reverb integration for instant updates to digital menu boards when items are sold out.</p>
            </div>
            <div class="bg-slate-800/50 backdrop-blur-sm p-8 rounded-xl border border-slate-700">
                <div class="text-blue-500 text-4xl mb-4">🍽️</div>
                <h3 class="text-xl font-bold text-white mb-3">Flexible Menu Engine</h3>
                <p class="text-gray-400">Manage prices, items, allergens, categories, and modifiers with a powerful admin interface.</p>
            </div>
            <div class="bg-slate-800/50 backdrop-blur-sm p-8 rounded-xl border border-slate-700">
                <div class="text-blue-500 text-4xl mb-4">🎨</div>
                <h3 class="text-xl font-bold text-white mb-3">Developer-Friendly</h3>
                <p class="text-gray-400">Design agencies handle CSS, we provide the infrastructure. Perfect backend-as-a-service solution.</p>
            </div>
        </div>
    </section>

    <section class="bg-slate-800/50 backdrop-blur-sm border-y border-slate-700 py-20 mt-20">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-white text-center mb-12">How It Works</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-blue-600 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">1</div>
                    <h3 class="text-xl font-bold text-white mb-3">Create Your Restaurant</h3>
                    <p class="text-gray-400">Set up your restaurant profile with custom subdomain and branding.</p>
                </div>
                <div class="text-center">
                    <div class="bg-blue-600 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">2</div>
                    <h3 class="text-xl font-bold text-white mb-3">Build Your Menus</h3>
                    <p class="text-gray-400">Add categories, items, prices, allergens, and modifiers through intuitive admin panel.</p>
                </div>
                <div class="text-center">
                    <div class="bg-blue-600 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">3</div>
                    <h3 class="text-xl font-bold text-white mb-3">Deploy & Integrate</h3>
                    <p class="text-gray-400">Generate QR codes or use our API to integrate with your existing systems.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-slate-900 text-white mt-20">
        <div class="max-w-7xl mx-auto px-4 py-12 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h4 class="text-lg font-bold mb-4">MenuFlow</h4>
                <p class="text-gray-400 text-sm">Headless Menu CMS built for modern restaurants and design agencies.</p>
            </div>
            <div>
                <h4 class="text-lg font-bold mb-4">Platform</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Features</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">API Documentation</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Pricing</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-lg font-bold mb-4">Resources</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Documentation</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Guides</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Support</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-lg font-bold mb-4">Company</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">About</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Contact</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Privacy</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-slate-800 py-6 text-center text-sm">
            <p class="text-gray-400">© 2024 MenuFlow. All rights reserved.</p>
            <p class="mt-2 text-gray-500">Made with ❤️ by <a href="https://laracopilot.com/" target="_blank" class="hover:underline text-blue-400">LaraCopilot</a></p>
        </div>
    </footer>
</body>
</html>
