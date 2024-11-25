<body class="h-full">
<nav class="" x-data="{ isOpen: false }">
<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 mt-4">
    <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
            <span class="text-black font-bold text-2xl" style="font-family: 'Playfair Display'">FurniCycle</span>
        </div>
        
    <div class="hidden md:flex justify-center flex-grow">
        <div class="ml-10 flex items-baseline space-x-4">
            <a href="/" 
                class="{{ request()->is('/') ? 'text-green-700' : 'text-gray-500 hover:text-green-700' }} 
                text-base font-light rounded-md px-3 py-2 text-sm font-medium font-sans">
                Home
            </a>
            <a href="/shop" 
                class="{{ request()->is('shop') ? 'text-green-700' : 'text-gray-500 hover:text-green-700' }} 
                text-base font-light rounded-md px-3 py-2 text-sm font-medium font-sans">
                Shop
            </a>
            <a href="/about" 
                class="{{ request()->is('about') ? 'text-green-700' : 'text-gray-500 hover:text-green-700' }} 
                text-base font-light rounded-md px-3 py-2 text-sm font-medium font-sans">
                About
            </a>
            <a href="/contact" 
                class="{{ request()->is('contact') ? 'text-green-700' : 'text-gray-500 hover:text-green-700' }} 
                text-base font-light rounded-md px-3 py-2 text-sm font-medium font-sans">
                Contact
            </a>
        </div>
    </div>    
    
    <div style="position: relative; display: flex; justify-content: flex-end; align-items: center; padding: 10px 50px;">
        <!-- Ikon Keranjang -->
        <div class="hidden md:block" style="margin-right: 20px;">
            <button type="button" class="relative rounded-full p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">View Cart</span>
                <!-- Ikon Keranjang Belanja -->
                <i class="fas fa-shopping-cart text-black" style="font-size: 24px;"></i>
            </button>
        </div>
    
        <!-- Login & Register -->
        <div class="top-right links" style="position: absolute; top: 15px; right: 0px; display: flex; gap: 3px; align-items: center;">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a class="font-sans font-medium" href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        {{-- <a href="{{ route('register') }}">Register</a> --}}
                    @endif
                @endauth
            @endif
        </div>
    </div>          

    </div>

    

        <!-- Profile dropdown -->
        <div class="relative ml-3">

            <div 
                x-show="isOpen"
                x-transition:enter="transition ease-out duration-100 transform"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75 transform"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <!-- Active: "bg-gray-100 outline-none", Not Active: "" -->
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
            </div>
        </div>
        </div>
    </div>
    <div class="-mr-2 flex md:hidden">
        <!-- Mobile menu button -->
        <button type="button" @click="isOpen = !isOpen" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
        <span class="absolute -inset-0.5"></span>
        <span class="sr-only">Open main menu</span>
        <!-- Menu open: "hidden", Menu closed: "block" -->
        <svg :class="{'hidden': isOpen, 'block': !isOpen }" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
        <!-- Menu open: "block", Menu closed: "hidden" -->
        <svg :class="{'block': isOpen, 'hidden': !isOpen }" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
        </button>
    </div>
    </div>
</div>

<!-- Mobile menu, show/hide based on menu state. -->
<div x-show="isOpen" class="md:hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
    <a href="/home" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Home</a>
    <a href="/about" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">About</a>
    <a href="/blog" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Blog</a>
    <a href="/contact" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Contact</a>
    </div>
    <div class="border-t border-gray-700 pb-3 pt-4">
    <div class="flex items-center px-5">
        <div class="shrink-0">
        <img class="size-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
        </div>
        <div class="ml-3">
        <div class="text-base/5 font-medium text-white">Tom Cook</div>
        <div class="text-sm font-medium text-gray-400">tom@example.com</div>
        </div>
        <button type="button" class="relative ml-auto shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
        <span class="absolute -inset-1.5"></span>
        <span class="sr-only">View notifications</span>
        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
        </svg>
        </button>
    </div>
    <div class="mt-3 space-y-1 px-2">
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your Profile</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign out</a>
    </div>
    </div>
</div>
</nav>
    
</body>