<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-700">Tambah Diskon</h2>
        </div>
    </div>

    <div class="mt-6 max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
        <form method="POST" action="{{ route('promo_codes.store') }}">
            @csrf

            <div class="mb-4">
                <x-input-label for="code" :value="__('Code')" />
                <x-text-input id="code" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" 
                    type="text" name="code" :value="old('code')" required />
                <x-input-error :messages="$errors->get('code')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="discount_amount" :value="__('Jumlah Diskon')" />
                <x-text-input id="discount_amount" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" 
                    type="number" name="discount_amount" :value="old('discount_amount')" required />
                <x-input-error :messages="$errors->get('discount_amount')" class="mt-2" />
            </div>

            <div class="flex justify-end">
                <x-primary-button class="bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus:ring focus:ring-blue-200">
                    {{ __('Submit') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>

