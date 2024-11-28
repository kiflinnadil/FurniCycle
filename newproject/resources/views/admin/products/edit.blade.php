<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        <h2 class="font-semibold text-2xl text-gray-700 mb-6">Edit Produk</h2>

        <div class="flex flex-col lg:flex-row gap-8">

            <div class="flex justify-center mt-5 w-full lg:w-1/3">
                <div class="bg-gray-100 w-full h-64 flex items-center justify-center border rounded-lg">
                    <img id="imagePreview" src="{{ $product->photo ? asset('storage/' . $product->photo) : '/path/to/placeholder-image.jpg' }}" 
                        alt="Image Preview" class="object-cover h-full max-w-full rounded-lg">
                </div>
            </div>

            <div class="w-full lg:w-2/3">
                <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <x-input-label for="name" :value="__('Nama')" />
                        <x-text-input id="name" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-blue-200 focus:border-blue-500" 
                                    type="text" name="name" value="{{ $product->name }}" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="slug" :value="__('Slug')" />
                        <x-text-input id="slug" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-blue-200 focus:border-blue-500" 
                                    type="text" name="slug" value="{{ $product->slug }}" required />
                        <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="photo" :value="__('Foto')" />
                        <input id="photo" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-blue-200 focus:border-blue-500" 
                            type="file" accept="image/*" name="photo" onchange="previewImage(event)" />
                        <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="price" :value="__('Harga')" />
                        <x-text-input id="price" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-blue-200 focus:border-blue-500" 
                                    type="number" name="price" value="{{ $product->price }}" required />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="stock" :value="__('Stok')" />
                        <x-text-input id="stock" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-blue-200 focus:border-blue-500" 
                                    type="number" name="stock" value="{{ $product->stock }}" required />
                        <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="about" :value="__('Tentang')" />
                        <x-text-input id="about" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-blue-200 focus:border-blue-500" 
                                    type="text" name="about" value="{{ $product->about }}" required />
                        <x-input-error :messages="$errors->get('about')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="description" :value="__('Deskripsi')" />
                        <textarea id="description" name="description" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-blue-200 focus:border-blue-500" 
                                required>{{ $product->description }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="is_available" :value="__('Tersedia')" />
                        <select id="is_available" name="is_available" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-blue-200 focus:border-blue-500" required>
                            <option value="1" {{ $product->is_available ? 'selected' : '' }}>Ya</option>
                            <option value="0" {{ !$product->is_available ? 'selected' : '' }}>Tidak</option>
                        </select>
                        <x-input-error :messages="$errors->get('is_available')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="category_id" :value="__('Kategori')" />
                        <select id="category_id" name="category_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-blue-200 focus:border-blue-500" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>

                    <div class="flex justify-end">
                        <x-primary-button class="bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus:ring focus:ring-blue-200">
                            {{ __('Update') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
