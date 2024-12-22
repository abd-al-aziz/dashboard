<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #667eea, #764ba2);
        }
    </style>
</head>
<body class="flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Admin Login</h1>
            <p class="text-gray-600">Sign in to manage the system</p>
        </div>
        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-800" 
                    placeholder="Enter your email" 
                    required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-800" 
                    placeholder="Enter your password" 
                    required>
            </div>
            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center text-sm">
                    <input type="checkbox" class="form-checkbox text-blue-500 mr-2">
                    Remember Me
                </label>
                <a href="#" class="text-sm text-blue-500 hover:underline">Forgot Password?</a>
            </div>
            <button 
                type="submit" 
                class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Login
            </button>
        </form>
    </div>
</body>
</html>
