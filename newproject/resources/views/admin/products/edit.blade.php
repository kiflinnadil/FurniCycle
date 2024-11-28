<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        <h2 class="font-semibold text-2xl text-gray-700">Edit Kategori</h2>
        
        <form method="POST" action="{{ route('products.update', $product->id) }}">
            @csrf
            @method('PUT')

            <div class="mt-4">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" name="name" class="block mt-1 w-full" type="text" value="{{ $category->name }}" required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="slug" :value="__('Slug')" />
                <x-text-input id="slug" name="slug" class="block mt-1 w-full" type="text" value="{{ $category->slug }}" required />
                <x-input-error :messages="$errors->get('slug')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="icon" :value="__('Icon')" />
                <x-text-input id="icon" name="icon" class="block mt-1 w-full" type="text" value="{{ $category->icon }}" required />
                <x-input-error :messages="$errors->get('icon')" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-primary-button>
                    {{ __('Update') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
