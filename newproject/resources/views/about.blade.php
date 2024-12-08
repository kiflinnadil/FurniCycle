@extends('components.layout')
@section('title', 'Home')

@section('content')
<div class="min-h-full text-center relative">
    <main>
        <div class="mx-auto max-w-5xl px-3 py-6 sm:px-6 lg:px-8 flex mt-40 justify-center lg:w-1/2 pt-2">
            <h1 class="mt-8 text-[13vw] text-gray-300 font-bold absolute transform -translate-y-[100%]" style="font-family: 'Playfair Display', sans-serif; line-height: 0.9;">
                ABOUT
            </h1>
            <img src="{{ asset('image/home/3.jpg') }}" alt="Collection Image" class="absolute mt-4 w-[80%] mx-auto max-w-[30%]">
        </div>

        <div class="grid grid-cols-2 gap-8 max-w-7xl mx-auto mt-[500px]">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-3 mt-28">
                <h1 class="text-right text-4xl md:text-4xl font-bold text-black leading-tighta" style="font-family: 'Playfair Display', sans-serif; line-height: 0.9">
                    Welcome to Furniture Haven, where we believe that your home is more than just a place...
                </h1>
                <p class="text-right text-base text-gray-700 leading-relaxed mt-10">
                    It's a sanctuary, a canvas, and a reflection of your unique style and personality. Our journey began with a simple yet profound idea – to offer a diverse range of high-quality furniture that caters to the diverse tastes and needs of our customers. At Furniture Haven, we're committed to providing more than just products. We're dedicated to enriching your life at home, whether you're redecorating, moving into a new space, or simply looking to refresh your surroundings. With us, you're not just buying furniture; you're investing in the comfort, style, and ambiance of your home.            
                </p>
            </div>
        
            <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-12 mt-[-50px]">
                <img src="{{ asset('image/home/4.jpg') }}" alt="Main Image" class="w-full h-[100vh] object-cover shadow-lg w-[100%] h-[70vh]">
            </div>
        </div>
        

        <div class="grid grid-cols-1 lg:grid-cols-2 items-center max-w-7xl mx-auto py-20 px-6 gap-8 mt-28">
            <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-12 mt-[-490px]">
                <h4 class="text-left text-sm font-medium text-gray-500 uppercase tracking-widest mb-4">OUR STORY</h4>
                <h1 class="text-left text-7xl md:text-5xl font-bold text-black leading-tight font-serif mb-6">
                    SINCE OUR INCEPTION, WE'VE GROWN AND EVOLVED                
                    <p class="text-left text-base md:text-lg text-gray-600 mb-6">
            </div>
        
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-3 mt-28">
                <h1 class="text-left text-5xl md:text-5xl font-bold text-black leading-tighta mt-30" style="font-family: 'Playfair Display', sans-serif; line-height: 0.9">
                    FurniCycle was founded by us in 2024 with a vision to transform houses into homes
                </h1>
                <p class="text-left text-base md:text-lg text-gray-700 leading-relaxed mt-10 ">
                    With a passion for design and a keen eye for quality, we set out to create a furniture destination where every piece tells a story of craftsmanship and beauty. Since our inception, we've grown and evolved, always guided by the principles of exceptional quality, outstanding customer service, and a deep love for creating inviting living spaces. Our team of designers, artisans, and furniture enthusiasts is committed to making Furniture Haven a place where you find not just products, but experiences that resonate with your lifestyle.
                </p>
            </div>
        </div>
            
    </main>
    
</div>
@endsection

