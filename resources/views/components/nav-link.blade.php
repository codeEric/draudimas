@props(['active' => false])

@php
    $classes = 'text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium';
    if ($active) {
        $classes = 'bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium';
    }
@endphp

<a {{ $attributes(['class' => $classes]) }}>{{ $slot }}</a>
