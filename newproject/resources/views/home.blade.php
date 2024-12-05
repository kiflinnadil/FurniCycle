@extends('components.layout')
@section('title', 'Home')

@section('content')
<div class="min-h-full text-center relative">
    <main>
        <div class="mx-auto max-w-5xl px-3 py-6 sm:px-6 lg:px-8 flex items-center justify-center h-screen lg:w-1/2">
            <h1 class="text-[10vw] text-gray-300 font-bold absolute transform -translate-y-[100%]" style="font-family: 'Playfair Display', sans-serif; line-height: 0.9;">
                OUR<br>COLLECTION
            </h1>
            <img src="{{ asset('image/home/.jpg') }}" alt="Collection Image" class="absolute w-[80%] mt-6 mx-auto max-w-[30%]">
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
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias porro temporibus magni, nulla possimus sunt minus commodi doloremque iusto delectus et eum, adipisci sint sed culpa a dolores eaque voluptatibus.
                    <br><br>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias porro temporibus magni, nulla possimus sunt minus commodi doloremque iusto delectus et eum, adipisci sint sed culpa a dolores eaque voluptatibus.
                </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 items-center max-w-7xl mx-auto py-20 px-6 gap-8">
            <!-- Bagian Kiri (Teks) -->
            <div clas>
                <h4 class="text-left text-sm font-medium text-gray-500 uppercase tracking-widest mb-4">Lorem</h4>
                <h1 class="text-left text-3xl md:text-5xl font-bold text-black leading-tight font-serif mb-6">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.                </h1>
                <p class="text-left text-base md:text-lg text-gray-600 mb-6">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, mollitia animi ea cum fuga necessitatibus quos tempore quia dolores porro accusamus architecto earum consequuntur aut! Veritatis aut ratione fugit esse.                </p>
                <a href="/shop" class="inline-block bg-transparent border border-black text-black text-sm font-medium py-3 px-6 hover:bg-black hover:text-white transition duration-300">
                    Shop Now
                </a>
            </div>
        
            <!-- Bagian Kanan (Gambar) -->
            <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-12">
            <!-- Gambar Utama -->
            <img src="{{ asset('image/home/.jpg') }}" alt="Main Image" class="w-full h-auto rounded-lg shadow-lg">
            <!-- Gambar Overlay -->
            <img src="{{ asset('image/home/.jpg') }}" alt="Overlay Image" class="absolute top-10 right-10 w-1/2 h-auto rounded-lg shadow-lg">
            </div>
        </div>
            
    </main>

    
</div>
@endsection

