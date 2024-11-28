<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="flex h-screen">
            <aside class="w-64 bg-gray-500 text-white flex-shrink-0 hidden md:flex flex-col">
                <div class="py-6 px-4">
                    <h2 class="text-2xl font-bold text-center" style="font-family: 'Playfair Display'">FurniCycle</h2>
                </div>
            
                <nav class="mt-4 flex flex-col space-y-2">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                    class="flex items-center py-4 px-4 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition border-b-0
                    {{ request()->routeIs('dashboard') ? 'bg-gray-700 text-white' : '' }}">
                    <span class="material-icons text-gray-900 text-white">{{ __('Dashboard') }}</span>
                </x-nav-link>

                <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.index')" 
                    class="flex items-center py-4 px-4 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition border-b-0
                    {{ request()->routeIs('products.index') ? 'bg-gray-700 text-white' : '' }}">
                    <span class="material-icons text-gray-900 text-white">{{ __('Product') }}</span>
                </x-nav-link>

                <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.index')" 
                    class="flex items-center py-4 px-4 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition border-b-0
                    {{ request()->routeIs('categories.index') ? 'bg-gray-700 text-white' : '' }}">
                    <span class="material-icons text-gray-900 text-white">{{ __('Category') }}</span>
                </x-nav-link>
            
                    <a href="#" class="flex items-center py-4 px-4 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition">
                        <span class="material-icons text-gray-400">history</span>
                    </a>
            
                    <a href="#" class="flex items-center py-4 px-4 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition">
                        <span class="material-icons text-gray-400">logout</span>
                    </a>
                </nav>
            </aside>            

            <!-- Mobile Sidebar -->
            <div class="md:hidden">
                <button id="sidebarToggle" class="fixed top-4 left-4 bg-gray-800 text-white p-2 rounded-md shadow-md z-50">
                    ☰
                </button>
                <div id="mobileSidebar" class="fixed inset-0 bg-gray-800 text-white w-64 transform -translate-x-full transition-transform duration-300 z-40">
                    <div class="py-6 px-4">
                        <h2 class="text-2xl font-bold text-center">Admin Panel</h2>
                    </div>
                    <nav class="mt-4 space-y-2">
                        <a href="{{ route('dashboard') }}" class="block py-2 px-4 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition">
                            <span class="material-icons align-middle">dashboard</span> Dashboard
                        </a>
                        <a href="{{ route('products.index') }}" class="block py-2 px-4 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition">
                            <span class="material-icons align-middle">inventory</span> Produk
                        </a>
                        <a href="#" class="block py-2 px-4 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition">
                            <span class="material-icons align-middle">history</span> Histori
                        </a>
                        <a href="#" class="block py-2 px-4 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition">
                            <span class="material-icons align-middle">logout</span> Logout
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1 overflow-auto">
                @include('layouts.navigation')

                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main class="p-6">
                    {{ $slot }}
                </main>
            </div>
        </div>

        <script>
            // Mobile Sidebar Toggle
            const sidebarToggle = document.getElementById('sidebarToggle');
            const mobileSidebar = document.getElementById('mobileSidebar');

            sidebarToggle.addEventListener('click', () => {
                mobileSidebar.classList.toggle('-translate-x-full');
            });
        </script>
    </body>
</html>
