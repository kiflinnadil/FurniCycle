@props(['disabled' => false])

<textarea
    {!! $attributes->merge([
        'class' => 'block w-full rounded-lg border-gray-300 bg-blue-50 text-gray-800 focus:border-blue-500 focus:ring-blue-500 focus:bg-white'
    ]) !!}
>
    {{ $slot }}
</textarea>

