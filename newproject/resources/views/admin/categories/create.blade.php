<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        <div class="flex items-center justify-between mt-8">
            <h2 class="font-semibold text-2xl text-gray-700">Tambah Kategori</h2>
        </div>
    </div>
    <br>

    <div class="mt-4">
        <form method="POST" action="{{route('categories.store')}}">
            @csrf
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="slug" :value="__('Slug')" />
                <x-text-input id="Slug" class="block mt-1 w-full" type="text" name="slug" :value="old('slug')" required />
                <x-input-error :messages="$errors->get('slug')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="icon" :value="__('Icon')" />
                <x-text-input id="icon" class="block mt-1 w-full" type="text" name="icon" :value="old('icon')" required />
                <x-input-error :messages="$errors->get('icon')" class="mt-2" />
            </div>

            <x-primary-button class="bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-500">
                {{ __('Submit') }}
            </x-primary-button>

        </form>
    </div>
</x-app-layout>
