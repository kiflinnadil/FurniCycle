@extends('components.layout')
@section('title', 'Home')

@section('content')
<div class="min-h-full text-center relative">
    <main>
        <div class="mx-auto max-w-5xl px-3 py-6 sm:px-6 lg:px-8 flex items-center justify-center h-screen lg:w-1/2">
            <h1 class="text-[12vw] mt-20 text-gray-300 font-bold absolute transform -translate-y-[100%]" style="font-family: 'Playfair Display', sans-serif; line-height: 0.9;">
                OUR<br>COLLECTION
            </h1>
            <img src="{{ asset('image/home/7.jpg') }}" alt="Collection Image" class="absolute w-[80%] mt-24 mx-auto max-w-[45%]">
        </div>

        <div class="grid grid-cols-2 gap-8 max-w-7xl mx-auto py-6 px-6">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h4 class="text-right text-sm font-medium text-gray-500 uppercase tracking-widest mb-4">About Us</h4>
                <h1 class="text-right text-4xl md:text-6xl font-bold text-black leading-tighta" style="font-family: 'Playfair Display', sans-serif; line-height: 0.9">
                WELCOME TO<br>FURNICYCLE
                </h1>
            </div>

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-24">  
                <p class="text-left text-base md:text-lg text-gray-700 leading-relaxed mt-10">
                    At Furniture Haven, we’re not just selling furniture; we’re transforming spaces, enhancing comfort, and creating warmth. Each piece is thoughtfully designed to elevate any room while reflecting your unique style. We believe furniture is more than functional—it’s a personal expression.
                    <br><br>
                    Our journey began with a simple idea: to offer high-quality furniture for diverse tastes and needs. Over time, this has grown into a commitment to craftsmanship, durability, and elegance. At Furniture Haven, we’re here to help turn your house into a home and create spaces that inspire joy and comfort.                </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 items-start max-w-7xl mx-auto py-20 px-6 gap-8">
            <div class="self-start">
                <h4 class="text-left text-sm font-medium text-gray-500 uppercase tracking-widest mb-4">LIGHTNING SOLUTIONS</h4>
                <h1 class="text-left text-3xl md:text-5xl font-bold text-black leading-tight font-serif mb-6">
                    Brighten your space with FurniCycle Haven's ideal lighting solutions.
                                </h1>
                <p class="text-left text-base md:text-lg text-gray-600 mb-6">
                    We know that proper lighting can redefine a space, creating the perfect mood and elevating its ambiance.
                </p>
                <a href="/shop" class="inline-block bg-transparent border border-black text-black text-sm font-medium py-3 px-6 hover:bg-black hover:text-white transition duration-300">
                    Shop Now
                </a>
            </div>
        
            <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-12">
                <img src="{{ asset('image/home/12.jpg') }}" alt="Main Image" 
                    class="mt-14 shadow-lg max-w-[45%] relative z-10">
                <img src="{{ asset('image/home/11.jpg') }}" alt="Overlay Image" 
                    class="absolute top-6 right-10 w-1/2 h-auto w-[68%] shadow-lg z-0">
            </div>
        </div>
        
            
    </main>

    
</div>
@endsection

