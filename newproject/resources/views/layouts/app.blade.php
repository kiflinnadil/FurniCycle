<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="flex h-screen">
            <!-- Sidebar hanya untuk halaman selain Profile -->
            @if(auth()->user() && request()->routeIs('dashboard') || request()->routeIs('products.index') || request()->routeIs('categories.index') || request()->routeIs('promo_codes.index') || request()->routeIs('payments.index') || request()->routeIs('product_transactions.index') || request()->routeIs('product_transactions.details'))
                <aside class="w-64 bg-gray-500 text-white flex-shrink-0 hidden md:flex flex-col">
                    <div class="py-6 px-4">
                        <h2 class="text-2xl font-bold text-center" style="font-family: 'Playfair Display'">FurniCycle</h2>
                    </div>
                
                    <nav class="mt-4 flex flex-col space-y-2">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                            class="flex items-center py-4 px-4 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition border-b-0">
                            <span class="material-icons text-gray-900 text-white">{{ __('Dashboard') }}</span>
                        </x-nav-link>

                        <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.index')" 
                            class="flex items-center py-4 px-4 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition border-b-0">
                            <span class="material-icons text-gray-900 text-white">{{ __('Product') }}</span>
                        </x-nav-link>

                        <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.index')" 
                            class="flex items-center py-4 px-4 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition border-b-0">
                            <span class="material-icons text-gray-900 text-white">{{ __('Category') }}</span>
                        </x-nav-link>

                        <x-nav-link :href="route('promo_codes.index')" :active="request()->routeIs('promo_codes.index')" 
                            class="flex items-center py-4 px-4 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition border-b-0">
                            <span class="material-icons text-gray-900 text-white">{{ __('Promo Code') }}</span>
                        </x-nav-link>

                        <x-nav-link :href="route('payments.index')" :active="request()->routeIs('payments.index')" 
                            class="flex items-center py-4 px-4 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition border-b-0">
                            <span class="material-icons text-gray-900 text-white">{{ __('Payment') }}</span>
                        </x-nav-link>

                        <x-nav-link :href="route('product_transactions.index')" :active="request()->routeIs('product_transactions.index')" 
                            class="flex items-center py-4 px-4 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition border-b-0">
                            <span class="material-icons text-gray-900 text-white">{{ __('Product Transaction') }}</span>
                        </x-nav-link>
                        
                        {{-- <x-nav-link :href="route('product_transactions.details')" :active="request()->routeIs('product_transactions.details')" 
                            class="flex items-center py-4 px-4 text-gray-300 hover:bg-gray-700 hover:text-white rounded transition border-b-0">
                            <span class="material-icons text-gray-900 text-white">{{ __('Product Transaction') }}</span>
                        </x-nav-link> --}}
                    </nav>
                </aside>
            @endif

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
    </body>
</html>
