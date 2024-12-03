<body class="h-full">
    <nav class="" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 mt-4">
        <div class="flex h-20 items-center justify-between"> 
            <div class="flex items-center">
                <span class="text-black font-bold text-3xl" style="font-family: 'Playfair Display'">FurniCycle</span> 
            </div>
            
            <div class="hidden md:flex justify-center flex-grow">
                <div class="flex items-baseline space-x-6"> 
                    <a href="/" 
                        class="{{ request()->is('/') ? 'text-green-700' : 'text-gray-500 hover:text-green-700' }} 
                        text-base font-light rounded-md px-4 py-3 text-sm font-medium font-sans">
                        Home
                    </a>
                    <a href="/shop" 
                        class="{{ request()->is('shop') ? 'text-green-700' : 'text-gray-500 hover:text-green-700' }} 
                        text-base font-light rounded-md px-4 py-3 text-sm font-medium font-sans">
                        Shop
                    </a>
                    <a href="/about" 
                        class="{{ request()->is('about') ? 'text-green-700' : 'text-gray-500 hover:text-green-700' }} 
                        text-base font-light rounded-md px-4 py-3 text-sm font-medium font-sans">
                        About
                    </a>
                    <a href="/contact" 
                        class="{{ request()->is('contact') ? 'text-green-700' : 'text-gray-500 hover:text-green-700' }} 
                        text-base font-light rounded-md px-4 py-3 text-sm font-medium font-sans">
                        Contact
                    </a>
                </div>
            </div>                        
        
            <div class="flex items-center space-x-6"> 
                <!-- Ikon Keranjang -->
                <div class="hidden md:block mr-8"> 
                    <button type="button" class="relative rounded-full p-2 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View Cart</span>
                        <i class="fas fa-shopping-cart text-black" style="font-size: 18px;"></i> <!-- Meningkatkan ukuran ikon -->
                    </button>
                </div>
            
                <!-- Login & Register -->
                <div class="relative flex items-center justify-center">
                    @guest
                        <a href="{{ route('login') }}" class="text-gray-500 hover:text-green-700 flex items-center mr-4"> 
                            <i class="fas fa-sign-in-alt text-2xl"></i> 
                        </a>
                    @endguest
            
                    @auth
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                        <i class="fas fa-user-circle text-2xl text-gray-500"></i>
                                    </button>
                                </x-slot>
            
                                <x-slot name="content">
                                    <!-- Profile -->
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>
            
                                    <!-- Log Out -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    
    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="/home" class="block rounded-md bg-gray-900 px-3 py-3 text-base font-medium text-white" aria-current="page">Home</a> <!-- Meningkatkan padding -->
        <a href="/about" class="block rounded-md px-3 py-3 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">About</a> <!-- Meningkatkan padding -->
        <a href="/blog" class="block rounded-md px-3 py-3 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Blog</a> <!-- Meningkatkan padding -->
        <a href="/contact" class="block rounded-md px-3 py-3 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Contact</a> <!-- Meningkatkan padding -->
        </div>
        <div class="border-t border-gray-700 pb-3 pt-4">
        <div class="flex items-center px-5">
            <div class="shrink-0">
            <img class="size-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            </div>
            <div class="ml-3">
            <div class="text-base font-medium text-white">Tom Cook</div>
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
            <a href="#" class="block rounded-md px-3 py-3 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your Profile</a> <!-- Meningkatkan padding -->
            <a href="#" class="block rounded-md px-3 py-3 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a> <!-- Meningkatkan padding -->
            <a href="#" class="block rounded-md px-3 py-3 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign out</a> <!-- Meningkatkan padding -->
        </div>
        </div>
    </div>
    </nav>
    </body>
    