<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        <div class="flex items-center justify-between mt-8">
            <h2 class="font-semibold text-2xl text-gray-700">Tambah Produk</h2>
        </div>
    </div>
    <br>

    <div class="mt-4">
        <form method="POST" action="{{route('products.store')}}">
            @csrf
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="photo" :value="__('Photo')" />
                <x-text-input id="photo" class="block mt-1 w-full" type="text" name="photo" :value="old('photo')" required />
                <x-input-error :messages="$errors->get('photo')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="price" :value="__('Price')" />
                <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required />
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="stock" :value="__('Stock')" />
                <x-text-input id="stock" class="block mt-1 w-full" type="text" name="stock" :value="old('stock')" required />
                <x-input-error :messages="$errors->get('stock')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="description" :value="__('Description')" />
                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="is_available" :value="__('Is Available')" />
                <select id="is_available" name="is_available" class="block mt-1 w-full" required>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
                <x-input-error :messages="$errors->get('is_available')" class="mt-2" />
            </div>
            
            <div>
                <x-input-label for="category_id" :value="__('Category')" />
                <select id="category_id" name="category_id" class="block mt-1 w-full" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
            </div>
                        
            <x-primary-button class="bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-500">
                {{ __('Submit') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
