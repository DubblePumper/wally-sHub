<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body id="verifyBody" class="min-h-screen bg-black flex items-center justify-center w-screen">
<div class="flex items-center justify-center min-h-screen">
    <div class="absolute inset-0 bg-gray-900 bg-opacity-50 backdrop-filter backdrop-blur-sm"></div>
        <div class="w-96 rounded-lg shadow-lg p-6 bg-black border-2 border-gray-900 relative z-10">
            <div class="flex flex-col justify-center items-center h-full">
                <x-application-logo class="block w-24 h-24 fill-current text-gray-800" />
                <h2 class="text-3xl text-white font-semibold">Member Sign In</h2>
                <p class="text-gray-300">Access your WallyHub account</p>
            </div>

            <form action="{{ route('login') }}" method="POST">
            @csrf
                <div class="mt-8">
                    <input placeholder="E-mail" id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 bg-white/10 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                </div>
                <div class="mt-2">
                    <input placeholder="Password" id="password" name="password" type="password" autocomplete="password" required class="block w-full rounded-md border-0 bg-white/10 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                </div>

                <div class="flex items-center mt-4">
                    <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 rounded border-0 text-white bg-white/10 focus:ring-indigo-500">
                    <div class="ml-3 mt-2">
                        <label for="remember-me" class="block text-sm leading-6 text-white">Remember me on this computer</label>
                        <p class="text-sm text-gray-400">(Not recommended)</p>
                    </div>
                </div>

                <div class="mt-10 flex justify-center">
                    <button type="submit" class="px-8 py-3 bg-orange-500 hover:bg-orange-400 text-white font-bold">Sign in</button>
                </div>
            </form>

            <div class="mt-4 text-center">
                <p class="text-sm text-white">Don't have an account yet? <a class="cursor-pointer font-bold text-orange-500 hover:text-orange-600">Sign Up</a> here</p>
            </div>
        </div>
    </div>
</body>

</html>

