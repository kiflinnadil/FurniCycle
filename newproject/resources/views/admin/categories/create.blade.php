<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-700">Tambah Kategori</h2>
        </div>
    </div>

    <div class="mt-6 max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
        <form method="POST" action="{{ route('categories.store') }}">
            @csrf

            <div class="mb-4">
                <x-input-label for="name" :value="__('Nama Kategori')" />
                <x-text-input id="name" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" 
                    type="text" name="name" :value="old('name')" required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="icon" :value="__('Ikon (Opsional)')" />
                <x-text-input id="icon" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" 
                    type="text" name="icon" :value="old('icon')" />
                <x-input-error :messages="$errors->get('icon')" class="mt-2" />
            </div>

            <div class="flex justify-end">
                <x-primary-button class="bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus:ring focus:ring-blue-200">
                    {{ __('Submit') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
