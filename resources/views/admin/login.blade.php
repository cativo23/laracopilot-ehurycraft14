<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MenuFlow - Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-900 to-slate-800 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full">
        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">MenuFlow Admin</h1>
                <p class="text-gray-600">Headless Menu CMS</p>
            </div>

            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.login') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required autofocus>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Password</label>
                    <input type="password" name="password" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition-all duration-200 transform hover:scale-105">
                    Sign In
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-gray-200">
                <p class="text-sm text-gray-600 font-semibold mb-3">Test Credentials:</p>
                <div class="space-y-2 text-sm">
                    <div class="bg-gray-50 p-3 rounded">
                        <p class="font-mono text-gray-800">admin@menuflow.com</p>
                        <p class="font-mono text-gray-600">admin123</p>
                    </div>
                    <div class="bg-gray-50 p-3 rounded">
                        <p class="font-mono text-gray-800">manager@menuflow.com</p>
                        <p class="font-mono text-gray-600">manager123</p>
                    </div>
                    <div class="bg-gray-50 p-3 rounded">
                        <p class="font-mono text-gray-800">restaurant@menuflow.com</p>
                        <p class="font-mono text-gray-600">restaurant123</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
